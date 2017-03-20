@extends('layouts.master')

@section('title','xdl ask question')

@section('styles')
<style>
    .ui.fluid.search.dropdown {
        position: relative;
        z-index: 10;
    } 
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
            <form action="{{ route('post.question') }}" method="post">
                <div class="ui form">
                    <div class="field">
                        <input type="text" name="title" placeholder="标题：一句话说清问题，用问号结尾">
                    </div>
                    <select class="ui field fluid search dropdown" name="tag_name" multiple>
                        <option value="">点击选择问题对应标签</option>
                        @foreach($techtags as $techtag)
                            <option value="{{ Hashids::encode($techtag->id) }}">{{ $techtag->name }}</option>
                        @endforeach
                    </select>
                    <div class="field">
                        <!-- 编辑器容器 -->
                        <script id="container" name="content" type="text/plain"></script>
                    </div>
                    <div class="field">
                        <button class="ui button" tabindex="0">发起提问</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection

@section('scripts')
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
    });
    $('.ui.fluid.search.dropdown').dropdown({
        maxSelections: 4
    });
</script>
@endsection