@extends('layouts.main')


@section('content')
    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Список ваших альбомов</h1>
                <a href="{{ route('albums.create') }}" class="btn btn-primary my-2">Создать альбом</a>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row" style="margin-bottom: 50px;">

                    @foreach($data['albums'] as $album)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{  Storage::url($album->photos->first()->image)  ?? 'noimage.png' }}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" data-holder-rendered="true">
                                <div class="card-body">
                                    <strong>{{ $album->title }}</strong>
                                    <p>{{ $album->photos->count() . ' Фото' }}</p>
                                    <p class="card-text">{{ $album->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('albums.show',$album->id) }}" type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center">View</a>
                                            <a href="{{ route('albums.edit',$album->id) }}" type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center">Edit</a>
                                            <form class="btn btn-sm btn-outline-secondary d-flex align-items-center" action="#" data-albumid="{{$album->id}}" method="DELETE">
                                                @csrf
                                                @method('DELETE')
                                                <button class="border-0 bg-transparent btn btn-sm btn-outline-secondary" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div style="display: flex;justify-content: center">
                    <div>
                        {{ $data['albums']->links() }}
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.album form').on('submit', function(e) {
                e.preventDefault();

                var form = this;

                $.ajax({
                    url:"/albums/"+$(this).data('albumid'),
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
@endsection