@extends('layouts.master')

@section('title','xdl index 😀')

@section('styles')

@endsection
@section('content')
       @include('includes.header')        

        <div class="ui container">
            <!-- 核心内容 -->
            <article>
                 <div class="ui pointing secondary menu">
                    <a class="item active" data-tab="first">最新</a>
                    <a class="item" data-tab="second">热门</a>
                    <a class="item" data-tab="third">讲师</a>
                </div>
                <div class="ui tab segment vertical active" data-tab="first">
                    <div class="ui items stackable">
                        <div class="item">
                            <section>
                                <div class="left floated section-left">
                                    <div class="ui vertical tiny buttons">
                                        <button class="ui icon button">
                                            <i class="heart icon"></i> 
                                        </button>
                                        <!--<div class="ui labeled button" tabindex="0">
                                            <div class="ui grey button"><i class="heart icon"></i>  </div>
                                        </div>-->
                                        <div class="ui divider"></div>
                                        <button class="ui icon button">
                                            <i class="comment icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="content">
                                    <h2 class="ui medium header">
                                    <a class="header">关于页面同时异步请求两个js，渲染页面等待如何优化</a>
                                    </h2>
                                    <div class="extra">
                                        <a class="ui tiny basic label">php</a>
                                        <a class="ui tiny basic label">前端学习</a>
                                    </div>
                                </div>
                            </section><!-- section -->
                        </div><!-- item -->

                         <div class="item">
                            <section>
                                <div class="left floated section-left">
                                    <div class="ui vertical tiny buttons">
                                        <button class="ui icon button">
                                            <i class="heart icon"></i> 
                                        </button>
                                        <div class="ui divider"></div>
                                        <button class="ui icon red button">
                                            <i class="comment icon"></i>20
                                        </button>
                                    </div>
                                </div>
                                <div class="content">
                                    <h2 class="ui medium header">
                                    <a class="header">关于页面同时异步请求两个js，渲染页面等待如何优化</a>
                                    </h2>
                                    <div class="extra">
                                        <a class="ui tiny basic label">php</a>
                                        <a class="ui tiny basic label">html</a>
                                        <a class="ui tiny basic label">css</a>
                                        <a class="ui tiny basic label">mysql</a>
                                        <a class="ui tiny basic label">JavaScript</a>
                                        <a class="ui tiny basic label">jQuery</a>
                                    </div>
                                </div>
                            </section><!-- section -->
                        </div><!-- item -->
                      </div>
                </div><!-- first end -->
                <div class="ui tab segment" data-tab="second"><h3 class="ui header">AJAX Tab Two</h3><img class="ui wireframe image" src="/images/wireframe/paragraph.png"><img class="ui wireframe image" src="/images/wireframe/paragraph.png"></div>
                <div class="ui tab segment" data-tab="third"><h3 class="ui header">AJAX Tab Three</h3><img class="ui wireframe image" src="/images/wireframe/paragraph.png"><img class="ui wireframe image" src="/images/wireframe/paragraph.png"></div>
            </article>
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
        //核心内容 tab选项卡js
$('.ui.secondary.menu .item')
  .tab({
    cache: false,
    // faking API request
    apiSettings: {
      loadingDuration : 300,
      mockResponse    : function(settings) {
        var response = {
          first  : 'AJAX Tab One',
          second : 'AJAX Tab Two',
          third  : 'AJAX Tab Three'
        };
        return response[settings.urlData.tab];
      }
    },
    context : 'parent',
    auto    : true,
    path    : '/'
  })

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