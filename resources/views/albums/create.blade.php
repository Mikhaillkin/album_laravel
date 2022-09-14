{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}
{{--    <meta name="csrf-token" content="{{csrf_token()}}" >--}}
{{--    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">--}}

{{--    <title>Создание альбома</title>--}}

{{--    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">--}}

{{--    <!-- Bootstrap core CSS -->--}}
{{--    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">--}}

{{--    <!-- Custom styles for this template -->--}}
{{--    <link href="form-validation.css" rel="stylesheet">--}}
{{--</head>--}}

@extends('layouts.main')

@section('content')
<body class="bg-light">

<div class="container">
{{--    <div class="py-5 text-center">--}}
{{--        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">--}}
{{--        <h2>Checkout form</h2>--}}
{{--        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>--}}
{{--        @dd($albums)--}}
{{--        <table class="table table-hover table-condensed" id="albums-table">--}}
{{--            <thead class="d-flex justify-content-between">--}}
{{--            <th>id</th>--}}
{{--            <th>Название</th>--}}
{{--            <th>Описание</th>--}}
{{--            <th>Автор</th>--}}
{{--            </thead>--}}
{{--            <tbody class="d-flex flex-column" >--}}
{{--            @foreach($albums as $album)--}}
{{--                <tr>--}}
{{--                    <td>{{ $album->id }}</td>--}}
{{--                    <td>{{ $album->title }}</td>--}}
{{--                    <td>{{ $album->description }}</td>--}}
{{--                    <td>{{ $album->user_id }}</td>--}}
{{--                <tr/>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

    <div class="row d-flex justify-content-center" style="padding-top: 20%;padding-bottom: 21%;">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Создание албома</h4>
{{--            <form action="{{route('albums.store')}}" method="POST" class="needs-validation" novalidate id="add_album" >--}}
            <form action="#" method="POST" class="needs-validation" novalidate id="add_album" >
                @csrf
                <div class="mb-3">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Введите название альбома" required>
                    <span class="text-danger error-text title_error" ></span>
{{--                    @error('title')--}}
{{--                        <div class="text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}

                </div>

                <div class="mb-3">
                    <label for="description">Описание</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Введите описание альбома" required>
                    <span class="text-danger error-text description_error" ></span>
                    {{--                    @error('description')--}}
{{--                        <div class="text-danger">{{ $message }}</div>--}}
{{--                    @enderror--}}
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block mb-2" type="submit">Создать</button>
                <a href="{{ route('albums.index') }}" class="btn btn-primary btn-lg btn-block">Вернуться на  Главную</a>
            </form>
        </div>
    </div>

{{--    <footer class="my-5 pt-5 text-muted text-center text-small">--}}
{{--        <p class="mb-1">&copy; 2017-2018 Company Name</p>--}}
{{--        <ul class="list-inline">--}}
{{--            <li class="list-inline-item"><a href="#">Privacy</a></li>--}}
{{--            <li class="list-inline-item"><a href="#">Terms</a></li>--}}
{{--            <li class="list-inline-item"><a href="#">Support</a></li>--}}
{{--        </ul>--}}
{{--    </footer>--}}
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
<script>
    $(document).ready(function() {

        $('#add_album').on('submit', function(e) {
            e.preventDefault();
            var form = this;

            $.ajax({
                url:"{{ route('albums.store') }}",
                method: "POST",
                data: new FormData(form),
                processData:false,
                dataType: 'json',
                contentType: false,
                beforeSend: function () {
                    $(form).find('span.error-text').text('');
                },
                success: function (data) {
                    // if(data.code == 0) {
                    //     $.each(data.error, function(prefix,val) {
                    //        $(form).find('span.'+prefix+'_error').text(val[0]);
                    //     });
                    // }else {
                    //     $(form)[0].reset();
                    //     alert(data.msg);
                    // }
                    $(form)[0].reset();
                    alert(data.msg);
                },
                error: function (data) {
                    // console.log(data.responseJSON.errors);
                    if(data.hasOwnProperty('responseJSON') &&  data.responseJSON.hasOwnProperty('errors')) {}
                    $.each(data.responseJSON.errors, function(prefix,val) {
                        $(form).find('span.'+prefix+'_error').text(val[0]);
                    });
                }
            })
        });

    });



    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';

        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
@endsection
{{--</html>--}}
