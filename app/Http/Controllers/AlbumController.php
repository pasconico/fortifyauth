<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::where('user_id', auth()->user()->id)->get();
        return view('/albums/album-view', compact('albums'));
    }

    public function createAlbum()
    {
        return view('/albums/create-album');
    }

    public function storeAlbum(AlbumRequest $request)
    {
        $album_photo = $request->album_photo;
        $album_name = $request->album_name;
        $album_genre = $request->album_genre;
        $album_description = $request->album_description;

        $path = public_path('albums');
        $image_name = time() . '.' . $request->album_photo->extension();
        $request->album_photo->move($path, $image_name);
        $album = new Album();
        $album->user_id = auth()->user()->id;
        $album->album_photo = $image_name;
        $album->album_name = $album_name;
        $album->album_genre = $album_genre;
        $album->album_description = $album_description;
        $album->save();

        return redirect()->back()->with('success', 'Album Created.');
    }

    public function editAlbum($id)
    {
        $albums = Album::find($id);
        return view('albums.edit-album', compact('albums'));
    }

    public function updateAlbum(AlbumRequest $request, $id)
    {
        $album = Album::find($id);
        $album->user_id = auth()->user()->id;
        $album_photo = $request->album_photo;
        $album_name = $request->album_name;
        $album_genre = $request->album_genre;
        $album_description = $request->album_description;

        $path = public_path('albums');
        $image_name = time() . '.' . $request->album_photo->extension();
        $request->album_photo->move($path, $image_name);
        $album->album_photo = $image_name;
        $album->album_name = $album_name;
        $album->album_genre = $album_genre;
        $album->album_description = $album_description;
        $album->save();
        return redirect()->back()->with('success', 'Album Updated.');
    }

    public function deleteAlbum($id)
    {
        Album::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'Album Deleted.');
    }
}
