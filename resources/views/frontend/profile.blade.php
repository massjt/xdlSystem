@extends('layouts.master')

@section('title',$user->name.'的😬😀个人中心')

@section('styles')
<style>

</style>
@endsection

@section('content')
    @include('includes.header')
    <div class="row">
        <div class="column">
            <h2 class="ui center aligned icon header"><i class="circular users icon"></i> Friends </h2>
        </div>
    </div>
@endsection

@section('scripts')
<!-- 实例化编辑器 -->
<script type="text/javascript">
    $('.ui.fluid.search.dropdown').dropdown({
        maxSelections: 4
    });
</script>
@endsection