<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::to('css/share/semantic.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/layout.css') }}">
    <title>@yield('title')</title>
    @yield('styles')
</head>
<body>
    <div class="ui grid container">
        
            @yield('content')
        
    </div>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{ URL::to('js/share/semantic.js') }}"></script>
    @yield('scripts')
    <script>
        $('.header-search-item').click(function(){
            $('.ui.page.dimmer').dimmer('toggle')
        })
    //头部点击user弹出
        $('.ui.dropdown.header-user').dropdown({
            transition: 'drop'
        });
    </script>
</body>
</html>