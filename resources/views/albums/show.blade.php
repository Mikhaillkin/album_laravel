@extends('layouts.main')


@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Страница альбома "{{ $album->title }}"</h1>
            <p class="lead text-muted">Описание: {{ $album->description }}</p>
            <p>
{{--                @dd($album->id)--}}
                <a href="{{ route('photos.create',['album_id' => $album->id]) }}" class="btn btn-primary my-2">Добавить фотографию</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">

                @if( !empty($photos) )
                    @foreach($photos as $photo)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                {{--                            <img class="card-img-top" src="{{ 'http://127.0.0.1:8000/' . 'public/storage/' . $photo->image }}" alt="Card image cap">--}}
                                <img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="{{ $photo->image }}" alt="Card image cap">
                                <div class="card-body d-flex justify-content-between">
                                    <p class="card-text" style="margin-bottom: 0; text-align: center;display: flex;align-items: center">{{ $photo->caption }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <form class="btn btn-sm btn-outline-secondary d-flex align-items-center" action="{{ route('photos.destroy',$photo->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent btn btn-sm btn-outline-secondary" type="submit">Delete Photo</button>
                                            </form>
                                        </div>
                                    </div>
                                    {{--                                <div class="d-flex justify-content-between align-items-center">--}}
                                    {{--                                    <div class="btn-group">--}}
                                    {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>--}}
                                    {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <small class="text-muted">9 mins</small>--}}
                                    {{--                                </div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="row">
                        <div class="d-flex justify-content-center align-items-center">
                            <h5 class="mb-5" data-aos="fade-up">В данном албоме пока нет фотографий</h5>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>

</main>

<footer class="text-muted" style="visibility: hidden;">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}

<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
{{--<script>--}}
{{--    $(document).ready(function() {--}}

{{--        $('#add_album').on('submit', function(e) {--}}
{{--            e.preventDefault();--}}
{{--            var form = this;--}}

{{--            $.ajax({--}}
{{--                url:"{{ route('photos.destroy',$photo->id) }}",--}}
{{--                method: "POST",--}}
{{--                data: new FormData(form),--}}
{{--                processData:false,--}}
{{--                dataType: 'json',--}}
{{--                contentType: false,--}}
{{--                // beforeSend: function () {--}}
{{--                //     $(form).find('span.error-text').text('');--}}
{{--                // },--}}
{{--                success: function (data) {--}}
{{--                    // if(data.code == 0) {--}}
{{--                    //     $.each(data.error, function(prefix,val) {--}}
{{--                    //        $(form).find('span.'+prefix+'_error').text(val[0]);--}}
{{--                    //     });--}}
{{--                    // }else {--}}
{{--                    //     $(form)[0].reset();--}}
{{--                    //     alert(data.msg);--}}
{{--                    // }--}}

{{--                    $(form)[0].reset();--}}
{{--                    alert(data.msg);--}}
{{--                }--}}
{{--            })--}}
{{--        });--}}

{{--    });--}}
{{--</script>--}}
</body>


@endsection