@extends('layouts.master')

@section('title','xdl index 😀')

@section('styles')
<style>
.pagination {
    display: inline-block;
    padding-left: 0;
    margin: 20px 0;
    border-radius: 4px;
}
.pagination>li {
    display: inline;
}
.pagination>li>a, .pagination>li>span {
    position: relative;
    float: left;
    padding: 6px 12px;
    margin-left: -1px;
    line-height: 1.42857143;
    color: #337ab7;
    text-decoration: none;
    background-color: #fff;
    border: 1px solid #ddd;
}

.pagination > li.active > span,.pagination > li.active > span:hover,.pagination > li.active > span:focus {
  color: #fff;
  cursor: default;
  background-color: #DB2828;
  border: 1px solid #DB2828;
  border-bottom-color: transparent;
}

.pagination > li.disabled > span,
.pagination > li.disabled > span:hover,
.pagination > li.disabled > span:focus {
  color: #777;
  text-decoration: none;
  cursor: not-allowed;
  background-color: #ccc;
}
</style>
@endsection
@section('content')
       @include('includes.header')        
       <main>
            <!-- 核心内容 -->
                <div class="ui secondary pointing menu">
                    <a class="item active">最新回答</a>
                    <a class="item">热门</a>
                    <a class="item">讲师 </a>
                </div>
                <div class="ui tab segment vertical active">
                    <div class="ui items vertical stackable">
                    @foreach($questions as $question)
                        <div class="item">
                            <section>
                                <div class="left floated section-left">
                                    <div class="ui vertical tiny buttons">
                                        <button class="ui icon button">
                                            {{ $question->operating->where('voteup',true)->count() }}<i class="heart icon"></i> 
                                        </button>
                                        <div class="ui divider"></div>
                                        <button class="ui icon button">
                                            <i class="comment icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="content">
                                    <h2 class="ui medium header">
                                    <a class="header">{{ $question->title }}</a>
                                    </h2>
                                    <div class="extra">
                                        @foreach($question->techtags as $tag)
                                            <a class="ui tiny basic label">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </section><!-- section -->
                        </div><!-- item -->
                        @endforeach
                      </div>
                </div>
                <!-- first end -->
        </div>
       </main>
       <!-- paginate -->
       <div class="sixteen wide column">
            <nav>
                {{ $questions->links() }}
            </nav>
       </div>
        <!-- 全局遮罩 -->
       <div class="ui page dimmer">
            <div class="content">
                <div class="center">
                    <div class="ui search">
                        <div class="ui icon input huge">
                            <input class="prompt" type="text" placeholder="输入搜索内容">
                            <i class="search icon"></i>
                        </div>
                        <div class="results"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
<script>
  // 遮罩层 dimmer
  $('.header-search-item').click(function(){
        $('body').dimmer('toggle')
  })
//头部点击user弹出
  $('.ui.dropdown.header-user').dropdown({
      transition: 'drop'
  });
</script>
@endsection