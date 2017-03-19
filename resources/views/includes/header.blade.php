 <header>
    <div class="ui top fixed doubling menu">
        <div class="item">
            <img src="{{ URL::to('img/home/xdllogo.png') }}">
        </div>
        <div class="right menu">
            <a class="item">
                <i class="plus icon"></i>
            </a>
            <a class="item header-search-item">
                <i class="search icon"></i>
            </a>
            <a class="item">
                <i class="alarm outline icon"></i>
            </a>
                <div class="ui dropdown item header-user">
                    <i class="user icon"></i>
                    <div class="menu">
                        <a class="item" href="/profile">个人中心</a>
                        <a class="item" data-user="notifacation">消息通知</a>
                        <a class="item" data-user="recoder">回答记录</a>
                        <a class="item" href="/logout">登出</a>
                    </div>
                </div>
        </div>
    </div>
</header><!-- header -->
