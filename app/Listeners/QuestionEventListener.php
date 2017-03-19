<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\QuestionViewCount;
use App\Models\Question;
use Illuminate\Support\Facades\Redis;

class QuestionEventListener
{
    /**
     * 同一post最大访问次数,再刷新数据库
     */
    const postViewLimit = 30;

    /**
     * 同一用户浏览同一post过期时间
     */
    const ipExpireSec   = 300;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  QuestionViewCount  $event
     * @return void
     */
    public function handle(QuestionViewCount $event)
    {
        $question = $event->question;
        $client_ip = $event->client_ip;
        $ques_id = $question->id;

        if ($this->ipViewLimit($ques_id, $client_ip)) {
            $this->updateCacheViewCount($id, $ip);
        }

    }

    /**
     * 一段时间内，限制同一IP访问，防止增加无效浏览次数
     *
     * @param  $id
     * @param  $ip
     * @return void
     */
    
    public function ipViewLimit($id,$ip)
    {
        $ipQuestionViewKey = 'ques:ip:limit'.$id;
        //SISMEMBER命令 判断一个元素是否在集合中是一个时间复杂度为0(1)的操作，值存在时 返回1，值或键不存在时返回0
        $existsInRedisSet = Redis::command('SISMEMBER', [$ipQuestionViewKey,$ip]);
        if (!$existsInRedisSet) {
            // SADD向集合中增加一个或多个元素
            Redis::command('SADD',[$ipPostViewKey, $ip]);
             //并给该键设置生命时间,这里设置300秒,300秒后同一IP访问就当做是新的浏览量了
            Redis::command('EXPIRE', [$ipPostViewKey, self::ipExpireSec]);
            return true;
        }
        return false;
    }

    /**
     *  更新DB中post浏览次数
     *
     * @param  $id
     * @param  $count
     * @return void
     */

    public function updateModelViewCount($id,$count) 
    {
        //访问量达到300,再进行一次SQL更新
        $quesModel = Question::find($id);
        $quesModel->view_count += $count;
        $quesModel->save();
    }

     /**
     * 不同用户访问,更新缓存中浏览次数
     * @param $id
     * @param $ip
     */
    public function updateCacheViewCount($id, $ip)
    {
        $cacheKey = 'ques:view:'.$id;
        //这里以Redis哈希类型存储键,就和数组类似,$cacheKey就类似数组名,$ip为$key.HEXISTS指令判断$key是否存在$cacheKey中
        if(Redis::command('HEXISTS', [$cacheKey, $ip])){
            //哈希类型指令HINCRBY,就是给$cacheKey[$ip]加上一个值,这里一次访问就是1
            $incre_count = Redis::command('HINCRBY', [$cacheKey, $ip, 1]);
            //redis中这个存储浏览量的值达到30后,就往MySQL里刷下,这样就不需要每一次浏览,来一次query,效率不高
            if($incre_count == self::postViewLimit){
                $this->updateModelViewCount($id, $incre_count);
                //本篇post,redis中浏览量刷进MySQL后,把该篇post的浏览量键抹掉,等着下一次请求重新开始计数
                Redis::command('HDEL', [$cacheKey, $ip]);
                //同时,抹掉post内容的缓存键,这样就不用等10分钟后再更新view_count了,
                //如该篇post在100秒内就达到了30访问量,就在3分钟时更新下MySQL,并把缓存抹掉,下一次请求就从MySQL中请求到最新的view_count,
                //当然,100秒内view_count还是缓存的旧数据,极端情况300秒内都是旧数据,而缓存里已经有了29个新增访问量
                //实际上也可以这样做:在缓存post的时候,可以把view_count单独拿出来存入键值里如single_view_count,每一次都是给这个值加1,然后把这个值传入视图里
                //或者平衡设置下postViewLimit和ipExpireSec这两个参数,对于view_count这种实时性要求不高的可以这样做来着
                //加上laravel前缀,因为Cache::remember会自动在每一个key前加上laravel前缀,可以看cache.php中这个字段:'prefix' => 'laravel'
                Redis::command('DEL', ['laravel:ques:cache:'.$id]);
            }
        }else{
            //哈希类型指令HSET,和数组类似,就像$cacheKey[$ip] = 1;
            Redis::command('HSET', [$cacheKey, $ip, '1']);
        }
    }
}
