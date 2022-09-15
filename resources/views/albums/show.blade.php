@extends('layouts.main')


@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Страница альбома "{{ $album->title }}"</h1>
            <p class="lead text-muted">Описание: {{ $album->description }}</p>
            <p>
                @if ( $album->user_id == $AuthorizedUserId)
                    <a href="{{ route('photos.create',['album_id' => $album->id]) }}" class="btn btn-primary my-2">Добавить фотографию</a>
                @endif
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
                                <div class="card-body d-flex justify-content-between" >
                                    <p
                                            class="card-text"
                                            style="margin-bottom: 0; text-align: center;display: flex;align-items: center;overflow: hidden;">
                                        {{ $photo->caption }}
                                    </p>
                                    @if ( $photo->album->user_id == $AuthorizedUserId)
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <form class="btn btn-sm btn-outline-secondary d-flex align-items-center" action="#" method="DELETE" data-photoid="{{$photo->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0 bg-transparent btn btn-sm btn-outline-secondary" type="submit">Delete Photo</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
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


<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script src="/dist/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {

        $('.album form').on('submit', function(e) {
            e.preventDefault();

            var form = this;

            $.ajax({
                url:"/photos/"+$(this).data('photoid'),
                method: "POST",
                data: new FormData(form),
                processData:false,
                dataType: 'json',
                contentType: false,
                success: function (data) {
                    $(form)[0].reset();
                    alert(data.msg);
                    window.location.reload();
                }
            })
        });

    });
</script>
</body>


@endsection