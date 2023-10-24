<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index($id)
    {

        $songs = Song::where('album_id', $id)->get();
        $album_name = Album::where('id', $id)->get()->pluck('album_name')->first();
        return view('/songs/song-list', compact('songs', 'id', 'album_name'));
    }

    public function addSong($id)
    {
        return view('/songs/add-song', compact('id'));
    }

    public function storeSong(SongRequest $request)
    {
        $album_id = $request->album_id;
        $song_name = $request->song_name;
        $song_url = $request->song_url;
        $song_description = $request->song_description;
        $song_duration = $request->song_duration;

        $song = new Song();
        $song->album_id = $album_id;
        $song->song_name = $song_name;
        $song->song_url = $song_url;
        $song->song_description = $song_description;
        $song->song_duration = $song_duration;
        $song->save();

        return redirect()->back()->with('success', 'Song Added.');
    }

    public function editSong($id)
    {
        $songs = Song::find($id);
        return view('songs.edit-song', compact('songs'));
    }

    public function updateSong(SongRequest $request, $id)
    {
        $song = Song::find($id);
        $album_id = $request->album_id;
        $song_name = $request->song_name;
        $song_url = $request->song_url;
        $song_description = $request->song_description;
        $song_duration = $request->song_duration;

        $song->song_name = $song_name;
        $song->album_id = $album_id;
        $song->song_url = $song_url;
        $song->song_description = $song_description;
        $song->song_duration = $song_duration;
        $song->save();
        return redirect()->back()->with('success', 'Song Updated.');
    }

    public function deleteSong($id)
    {
        Song::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'Song Deleted.');
    }
}
