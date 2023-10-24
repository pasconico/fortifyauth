@extends('layouts.app')
<title>Albums</title>
@section('content')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <a class="btn btn-primary" href="{{ url('/albums/create-album') }}" role="button">Create New
                            Album</a>
                    </div>
                </div>
                <div class="row">
                    @foreach ($albums as $album)
                        <div class="col-sm-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('albums/' . $album->album_photo) }}" alt=""
                                                class="rounded img-fluid" style="width:200px;">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="card-title">{{ $album->album_name }}</h6>
                                            <h5 class="card-subtitle">{{ $album->album_genre }}</h5>
                                            <h5 class="card-text mb-2">{{ $album->album_description }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row-reverse">
                                        <div class="me-2">
                                            <form action="{{ route('deleteAlbum', $album->id) }}" method="POST">
                                                @csrf
                                                <a href="{{ route('songList', $album->id) }}" class="btn btn-success">View
                                                    Songs</a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('editAlbum', $album->id) }}">Edit</a>
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Delete this album?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
