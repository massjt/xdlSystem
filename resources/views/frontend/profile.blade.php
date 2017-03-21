@extends('layouts.master')

@section('title','😀个人中心')

@section('styles')
<style>

</style>
@endsection

@section('content')
    @include('vendor.ueditor.assets')
    @include('includes.header')
    
@endsection

@section('scripts')
<!-- 实例化编辑器 -->
<script type="text/javascript">
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