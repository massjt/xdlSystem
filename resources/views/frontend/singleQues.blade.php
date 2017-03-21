@extends('layouts.master')
@section('title',$question->title)
@section('styles')
<style>
#container {
    width: 100%;
}

</style>
@endsection
@section('content')
    @include('vendor.ueditor.assets')
    @include('includes.header')
    <div class="row">
        <div class="column">
            <div class="ui divided items">
                <div class="item">
                    <div class="content">
                    <h1 class="ui header">
                        <a href="{{ Request::getRequestUri() }}">{{ $question->title }}</a>
                    </h1>
                    <div class="meta">
                        <a href="">孙马克</a>
                        <span class="cinema">{{ $question->created_at }}</span>
                        <span>{{ $question->view_count }} 阅读</span>
                    </div>
                    <div class="description">
                        <p></p>
                    </div>
                    <div class="extra">
                        @foreach($question->techtags as $tag)
                            <a class="ui tiny basic label">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 编辑器容器 -->
    <div class="ui raised segment" style="border:0;width:100%;">
        <p>
            {!! $question->content !!}
        </p>
    </div>
    <h2 class="ui dividing header" style="width:100%;">多少个回答</h2>
    <script id="container" name="content" type="text/plain"></script>
@endsection

@section('scripts')
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
</script>
@endsection