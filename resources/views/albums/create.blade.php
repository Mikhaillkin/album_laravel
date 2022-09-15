

@extends('layouts.main')

@section('content')
<body class="bg-light">

<div class="container">

    <div class="row d-flex justify-content-center" style="padding-top: 20%;padding-bottom: 21%;">
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Создание альбома</h4>
            <form action="#" method="POST" class="needs-validation" novalidate id="add_album" >
                @csrf
                <div class="mb-3">
                    <label for="title">Название</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Введите название альбома" required>
                    <span class="text-danger error-text title_error" ></span>
                </div>

                <div class="mb-3">
                    <label for="description">Описание</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Введите описание альбома" required>
                    <span class="text-danger error-text description_error" ></span>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block mb-2" type="submit">Создать</button>
                <a href="{{ route('albums.index') }}" class="btn btn-primary btn-lg btn-block">Вернуться на  Главную</a>
            </form>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

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
                    alert(data.msg);
                    $(location).attr('href', '{{ route('albums.index') }}');
                },
                error: function (data) {
                    if(data.hasOwnProperty('responseJSON') &&  data.responseJSON.hasOwnProperty('errors')) {

                        $.each(data.responseJSON.errors, function(prefix,val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
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
