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