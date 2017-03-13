@extends('layouts.master')

@section('title','xdl login')

@section('styles')

  <style>
            
            body {
              background-color: #DADADA;
            }
           
            .ui.grid > .row {
                justify-content: center;
            }
          
            .column {
                text-align: center;
            }

            .ui.teal.header {
              color: #C11920 !important;
            }

            .ui.teal.buttons .button:hover, .ui.teal.button:hover {
              background-color: #C11920;
            }

            .ui.teal.buttons .button, .ui.teal.button {
              background-color: #C11920;
            }

            .ui.button {
              background: #F8F8F9;
            }
            @media screen and (min-width: 960px) {
                .column {
                    width: 70% !important;
                }
            }
        </style>

@endsection

@section('content')

{{-- <div class="ui middle aligned center  grid"> --}}
  <div class="column">
    <h2 class="ui teal image header">
      <img src="{{ URL::to('img/home/xdllogo.png') }}" class="image centered">
    </h2>
    <form class="ui large form" method="post" action="{{ route('post.login') }}">
      <div class="ui stacked segment">
      @if (Session::has('fail'))
        <div class="error field">
      @else
        <div class="field">
      @endif
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="请输入邮箱">
          </div>
        </div>
      @if (Session::has('fail'))
        <div class="error field">
      @else
        <div class="field">
      @endif
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" value="{{ old('password') }}" placeholder="请输入密码">
          </div>
        </div>

        <div class="inline field" style="text-align:left;">
            <div class="ui checkbox">
            <input type="checkbox" id="remember_me" tabindex="0" name="remember_me" value="1">
            <label for="remember_me">记住我</label>
            </div>
        </div>

        <button class="ui fluid large teal submit button">Login</button>
      </div>
      {{ csrf_field() }}
      <div {{ (count($errors)>0 || Session::has('use_pwd_fail')) ? "style=display:block !important;" : '' }}  class="ui error message">
            @if (count($errors) > 0)
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
           @endif
           @if (Session::has('use_pwd_fail'))
                <ul class="list">
                    <li>{{ Session::get('use_pwd_fail') }}</li>
                </ul>
           @endif
      </div>

    </form>

    <div class="ui message">
      立刻加入? <div class="ui icon button" data-tooltip="联系班主任获取账号" data-position="bottom left" data-inverted="">
                <i class="location arrow icon"></i>
              </div>
    </div>
  </div>
{{-- </div> --}}

@endsection