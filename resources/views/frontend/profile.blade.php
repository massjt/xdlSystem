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
            <h2 class="ui center aligned icon header">
                <i class="circular users icon"></i> {{ $user->name }}
            </h2>
            <div class="ui two column grid">
                    <div class="column">
                        <div class="ui raised segment">
                            <a class="ui red ribbon label">个人信息</a> 
                            {{-- <span>Account Details</span>  --}}
                            <p><b>邮箱</b>: {{ $user->email }}</p> 
                            <p><b>创建时间:</b> {{ $user->created_at }}</p> 
                            <p><b>班级:</b> {{ $user->class }}</p>
                            <p><b>签名:</b> {{ $user->introduction }}</p>
                            
                            <a class="ui blue ribbon label">答题记录</a>
                            <p>left left left left</p> 
                        </div>
                    </div>
                    <div class="column">
                        <div class="ui segment">
                            <a class="ui orange right ribbon label">通知FAQ</a>
                            <p>right</p>
                            <a class="ui teal right ribbon label">最新回复</a>
                            <p>right right right right</p>
                        </div>
                    </div>
            </div>
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