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
    <form class="ui large form">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="请输入用户名">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="请输入密码">
          </div>
        </div>
        <div class="ui fluid large teal submit button">Login</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      立刻加入? <div class="ui icon button" data-tooltip="联系班主任获取账号" data-position="bottom left" data-inverted="">
                <i class="location arrow icon"></i>
              </div>
    </div>
  </div>
{{-- </div> --}}

@endsection