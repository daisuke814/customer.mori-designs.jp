<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mori designs') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <script src="https://kit.fontawesome.com/0d37fd5bfe.js" crossorigin="anonymous"></script>
{{--    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset("images/logo.png") }}" alt="" height="40px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="https://mori-designs.jp">ホームページへ</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route("changepass") }}">
                                        パスワード変更
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">メニュー</div>

                            <div class="list-group list-group-flush">
                                <a href="{{ route("thread") }}" class="list-group-item list-group-item-action"><i class="fa fa-inbox" aria-hidden="true"></i> スレッド</a>
                                <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-folder-open" aria-hidden="true"></i> ファイル</a>
                                <a href="{{ route("payment") }}" class="list-group-item list-group-item-action"><i class="fa fa-shopping-cart" aria-hidden="true"></i> お支払い</a>
                                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-cogs"></i> 設定</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>


        </main>

        <nav class="fixed-bottom navbar navbar-expand-md navbar-light bg-white border-top">
            <div class="container">
                <div>
                    <a href="https://letsencrypt.org/ja/how-it-works/">
                        <img src="{{ asset("images/lets-encrypt-logo.png") }}" alt="lets Encrypt" height="40px">
                    </a>
                    <small>このサイトはSSL通信により保護されています。</small>
                </div>
                <small>
                    &copy; 2020 Mori designs.
                </small>
            </div>
        </nav>
    </div>
</body>
</html>
