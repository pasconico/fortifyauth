@extends('layouts.app')
<title>Edit Album</title>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">Edit Album</h2>

                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <div class="d-flex flex-row-reverse">
                    <div class="">
                        <a class="btn btn-primary" href="{{ url('/albums/album-view') }}" role="button">Back</a>
                    </div>
                </div>

                <form method="post" action="{{ route('updateAlbum', $albums->id) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="md-3">
                        <label for="album_photo">Album Photo</label>
                        <input type="file" class="form-control  @error('album_photo') is-invalid @enderror"
                            name="album_photo" id="album_photo" placeholder="Enter Album Name">
                        @error('album_photo')
                            <div class="text text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="album_name">Album Name</label>
                        <input type="text" class="form-control  @error('album_name') is-invalid @enderror"
                            name="album_name" id="album_name" placeholder="Album Name" value="{{ $albums->album_name }}">
                        @error('album_name')
                            <div class="text text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="album_genre">Album Genre</label>
                        <input type="text" class="form-control  @error('album_genre') is-invalid @enderror"
                            name="album_genre" id="album_genre" placeholder="Album Genre"
                            value="{{ $albums->album_genre }}">
                        @error('album_genre')
                            <div class="text text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3 mb-3">
                        <label for="album_description">Album Description</label>
                        <textarea class="form-control  @error('album_description') is-invalid @enderror" name="album_description"
                            id="album_description" placeholder="Album Description">{{ $albums->album_description }}</textarea>
                        @error('album_description')
                            <div class="text text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Update Album</button>
                </form>
            </div>
        </div>
    </div>
@endsection
