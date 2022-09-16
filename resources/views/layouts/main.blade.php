<!DOCTYPE html>
<html lang="en">

<head>
{{--    Main page--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Album Index</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="/album.css" rel="stylesheet">



{{--    Album Create--}}
    <meta name="csrf-token" content="{{csrf_token()}}" >

    <title>Создание альбома</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <link href="/dist/css/bootstrap.min.css" rel="stylesheet">





    <style>
        #uploadImagesList {
            list-style: none;
            padding: 0;
        }
        #uploadImagesList .item {
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
        }
        #uploadImagesList .item .img-wrap {
            width: inherit;
            display: block;
            height: 150px;
        }
        #uploadImagesList .item .img-wrap img{
            width: auto;
            height: inherit;
        }
        #uploadImagesList .item .delete-link {
            cursor: pointer;
            display: block;
        }
        .clear {
            clear: both;
        }
    </style>
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Меню</h4>
                    <p class="text-muted">
                        <ul class="list-unstyled d-flex justify-content-between align-items-center">
                            @auth
                                <li><a href="{{ route('main.index') }}" class="text-white">Главная</a></li>
                                <li><a href="{{ route('albums.index') }}" class="text-white">Мои альбомы</a></li>
                                <li><a href="{{ route('albums.create') }}" class="text-white">Создать альбом</a></li>
                                <form method="POST"  action="{{ route('logout') }}">
                                    @csrf

                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-white">
                                        {{ __('Выйти') }}
                                    <a>
                                </form>
                            @endauth
                        @guest
                                <li><a href="{{ route('main.index') }}" class="text-white">Главная</a></li>
                                <li><a href="{{ route('login') }}" class="text-white">Войти</a></li>
                        @endguest
                        </ul>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

@yield('content')

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script src="/dist/js/bootstrap.min.js"></script>


<svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>

</html>