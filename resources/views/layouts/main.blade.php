<!DOCTYPE html>
<html lang="en">

<head>
{{--    Main page--}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">--}}

    <title>Album Index</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    {{--    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    {{--    <link href="album.css" rel="stylesheet">--}}
    <link href="album.css" rel="stylesheet">



{{--    Album Create--}}
    <meta name="csrf-token" content="{{csrf_token()}}" >
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Создание альбома</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">

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
                            <li><a href="{{ route('albums.index') }}" class="text-white">Главная</a></li>
                            <li><a href="{{ route('dashboard') }}" class="text-white">Личный кабинет</a></li>
                            <li><a href="{{ route('albums.create') }}" class="text-white">Создать альбом</a></li>
                            <form method="POST"  action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-white">
                                    {{ __('Выйти') }}
                                <a>
                            </form>
                        </ul>
                    </p>
                </div>
{{--                <div class="col-sm-4 offset-md-1 py-4">--}}
{{--                    <h4 class="text-white">Menu</h4>--}}

{{--                </div>--}}
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

{{--<div class="footer">--}}
{{--    <div class="container">--}}
{{--        <p class="float-right">--}}
{{--            <a href="#">Back to top</a>--}}
{{--        </p>--}}
{{--        <p>Album example is © Bootstrap, but please download and customize it for yourself!</p>--}}
{{--        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>--}}
{{--    </div>--}}
{{--    <div class="navbar navbar-dark bg-dark box-shadow">--}}
{{--        <div class="container d-flex justify-content-between" style="visibility: hidden;">--}}
{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
{{--<script src="../../assets/js/vendor/popper.min.js"></script>--}}
<script src="assets/js/vendor/popper.min.js"></script>
{{--<script src="../../dist/js/bootstrap.min.js"></script>--}}
<script src="dist/js/bootstrap.min.js"></script>
{{--<script src="../../assets/js/vendor/holder.min.js"></script>--}}
<script src="assets/js/vendor/holder.min.js"></script>


<svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>

</html>