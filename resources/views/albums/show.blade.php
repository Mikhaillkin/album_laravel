@extends('layouts.main')


@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Страица альбома "{{ $album->title }}"</h1>
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

                @foreach($photos as $photo)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
{{--                            <img class="card-img-top" src="{{ 'http://127.0.0.1:8000/' . 'public/storage/' . $photo->image }}" alt="Card image cap">--}}
                            <img class="card-img-top" style="height: 225px; width: 100%; display: block;" src="{{ $photo->image }}" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">{{ $photo->caption }}</p>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
</body>


@endsection