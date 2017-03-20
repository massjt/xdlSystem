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
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="标题：一句话说清问题，用问号结尾">
                    </div>
                    <select class="ui field fluid search dropdown" name="tag_name" value="{{ old('tag_name') }}" multiple>
                        <option value="">点击选择问题对应标签</option>
                        @foreach($techtags as $techtag)
                            <option value="{{ $techtag->id }}">{{ $techtag->name }}</option>
                        @endforeach
                    </select>
                    {{ csrf_field() }}
                    <div class="field">
                        <!-- 编辑器容器 -->
                        <script id="container" name="ask_content" type="text/plain"></script>
                    </div>
                    <div class="field">
                        <button class="ui button ask_question_btn" tabindex="0">发起提问</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        @if (count($errors)>0)
          <div class="ui error message" style="width:100%;">
            @if (count($errors) > 0)
                    <ul class="list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            @endif
            </div>
        @endif
@endsection

@section('scripts')
<!-- 实例化编辑器 -->
<script type="text/javascript">
    var ue = UE.getEditor('container');
    ue.ready(function() {
        ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        ue.setContent("{!! old('ask_content') !!}");
    });
    $('.ui.fluid.search.dropdown').dropdown({
        maxSelections: 4
    });
// 设置 标签值
    $('.ask_question_btn').click(function(){
        var len = $('.label.transition.visible').length;
        var t = [];
        for(var i = 0; i < len; i++) {
            t.push($('.label.transition.visible:eq('+i+')').data('value'));
        }
        $('select option:selected').val(t);
        $('form').submit();
    })
</script>
@endsection