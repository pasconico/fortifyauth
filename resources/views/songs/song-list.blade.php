@extends('layouts.app')

@section('content')
    <div class="container">
        @if (Session::has('success'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Song Deleted.',
                })
            </script>
        @endif

        <div class="row">
            <div class="col-md-12">
                <h1>{{ $album_name }}</h1>
                <div class="d-flex flex-row-reverse mb-3">
                    <div class="">
                        <a class="btn btn-primary" href="{{ url('/albums/album-view') }}" role="button">Back</a>
                        <a class="btn btn-primary" href="{{ route('addSong', $id) }}" role="button">Add Song</a>
                    </div>
                </div>
                <div class="tab-pane">
                    @foreach ($songs as $song)
                        <iframe style="border-radius:12px" src="{{ $song->song_url }}" width="100%" height="352"
                            frameBorder="0" allowfullscreen=""
                            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                            loading="lazy"></iframe>

                        <div class="d-flex flex-row-reverse mb-3">
                            <form action="{{ route('deleteSong', $song->id) }}" method="POST">
                                @csrf
                                <a href="{{ route('editSong', $song->id) }}" type="button" class="btn btn-primary">Edit
                                    Song</a>
                                <button class="btn btn-danger" type="submit"
                                    onclick="return confirm('Delete this song?')">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
