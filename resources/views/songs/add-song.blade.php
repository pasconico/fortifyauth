@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-3">Add Song</h2>

                @if (Session::has('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Song Added.',
                            footer: '<a href="{{route("songList", $id)}}">Return to Song List</a>'
                        })
                    </script>
                @endif

                <div class="d-flex flex-row-reverse">
                    <div class="">
                        <a class="btn btn-primary" href="{{ url('/songs/song-list', $id) }}" role="button">Back</a>
                    </div>
                </div>

                <form method="post" action="{{ route('storeSong') }}">
                    @csrf

                    <input type="hidden" id="" name="album_id" value="{{ $id }}">
                    <div class="md-3">
                        <label for="song_name">Song Title</label>
                        <input type="text" class="form-control  @error('song_name') is-invalid @enderror"
                            name="song_name" id="song_name" placeholder="Song Title" value="{{ old('song_name') }}">
                        @error('song_name')
                            <div class="text text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="song_url">Song URL</label>
                        <input type="text" class="form-control  @error('song_url') is-invalid @enderror" name="song_url"
                            id="song_url" placeholder="Song URL" value="{{ old('song_url') }}">
                        @error('song_url')
                            <div class="text text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3">
                        <label for="song_description">Song Description</label>
                        <input type="text" class="form-control  @error('song_description') is-invalid @enderror"
                            name="song_description" id="song_description" placeholder="Song Description"
                            value="{{ old('song_description') }}">
                        @error('song_description')
                            <div class="text text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="md-3 mb-3">
                        <label for="song_duration">Song Duration</label>
                        <input type="text" class="form-control  @error('song_duration') is-invalid @enderror"
                            name="song_duration" id="song_duration" placeholder="Song Duration"
                            value="{{ old('song_duration') }}">
                        @error('song_duration')
                            <div class="text text-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Add Song</button>
                </form>
            </div>
        </div>
    </div>
@endsection
