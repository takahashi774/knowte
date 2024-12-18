<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>KnouwTE</title>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    @yield('head')
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="{{ url('/') }}">KnowTE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        @if(Auth::check())
                            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">ホーム</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('create.page') }}">考察投稿</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('forum.page') }}">掲示板</a></li>
                            @can('admin')
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin.page') }}">管理者ページ</a></li>
                            @endcan
                        @else
                        @endif        
                    </ul>
                    <form class="d-flex">
                        @if(Auth::check())
                            <button class="btn btn-outline-dark  mx-2" type="submit">
                                <a class="my-navbar-item" href="{{ route('logout') }}">ログアウト</a>
                            </button>
                        @else
                            <button class="btn btn-outline-dark mx-2" type="submit">
                                <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
                            </button>
                        @endif
                            <button class="btn btn-outline-dark mx-2" type="submit">
                                <a class="my-navbar-item" href="{{ route('create.page') }}">投稿</a>
                            </button>
                    </form>
                </div>
            </div>
        </nav>
    @yield('header')
    </body>
</html>