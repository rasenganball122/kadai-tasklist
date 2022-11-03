<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Tasklist</a>
                    
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
                    
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if(Auth::check())
                    {{--タスク作成ページへのリンク--}}
                    <li class="nav-item">{!! link_to_route("tasks.create", "新規タスクの投稿", [], ["class"=>"nav-link"]) !!}</li>
                    {{-- ログアウトへのリンク --}}
                    <li class="nav-item">{!! link_to_route("logout.get", "Logout", [], ["class"=>"nav-link"]) !!}</li>
                @else
                    {{--新規ユーザ登録ページへのリンク--}}
                    <li class="nav-item">{!! link_to_route("signup.get", "Signup", [], ["class"=>"nav-link"]) !!}</li>
                    {{--ログインページへのリンク--}}
                    <li class="nav-item">{!! link_to_route("login.get", "Login", [], ["class"=>"nav-link"]) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>