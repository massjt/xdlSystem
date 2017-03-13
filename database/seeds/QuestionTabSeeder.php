<?php

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionTabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new Question();
        $question->title = '如何将option里面的value值,通过ajax提交到后台';
        $question->content = 'first first content';
        $question->save();

        $question = new Question();
        $question->title = 'React 回调函数ES6的一个问题';
        $question->content = 'second second react react';
        $question->save();

        $question = new Question();
        $question->title = 'js可以模拟ESC键盘事件吗？';
        $question->content = 'js可以模拟ESC键盘事件吗？';
        $question->save();

        $question = new Question();
        $question->title = '移动端打开pdf文件，pdf.js可以在移动端使用';
        $question->content = '移动端打开pdf文件，pdf.js可以在移动端使用移动端打开pdf文件，pdf.js可以在移动端使用';
        $question->save();

        $question = new Question();
        $question->title = 'axios无法发起跨域请求';
        $question->content = 'axios无法发起跨域请求axios无法发起跨域请求';
        $question->save();

    }
}
