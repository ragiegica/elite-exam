<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    public function index()
    {
        return view('modules.album.index');
    }

    public function indexData(Request $request)
    {
        $album = Album::with('artist')
            ->where('name', 'like', '%' . $request->search . '%')
            ->orWhereHas('artist', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->get();
        return response()->json($album);
    }

    public function singleAlbum($id)
    {
        $album = Album::with('artist')->findOrFail($id);
        $albumReturn = [
            'id' => $album->id,
            'artist_id' => $album->artist_id,
            'artist_name' => $album->artist->name,
            'name' => $album->name,
            'sales_data' => $album->sales_2022,
            'sales_data_formatted' => number_format($album->sales_2022),
            'release_date' => $album->date_release,
            'last_update' => $album->last_update,
            'cover' => $album->cover_path !== null ? Storage::url($album->cover_path) : null,
        ];
        return response()->json($albumReturn);
    }

    public function add(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->validate([
                'artist' => 'required|integer',
                'name' => 'required',
                'sales_data' => 'required',
                'release_date' => 'required',
                'last_date' => 'required',
                'cover' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            ]);

            if ($request->has('cover')) {
                $coverPath = $request->file('cover')->store('covers', 'public');
            }

            $data = new Album();
            $data->artist_id = $request->artist;
            $data->name = $request->name;
            $data->sales_2022 = $request->sales_data;
            $data->date_release = $request->release_date;
            $data->last_update = $request->last_date;
            $data->cover_path = isset($coverPath) ? $coverPath : null;
            $data->save();

            DB::commit();
            return response()->json('success', 200);
        } catch (Throwable $th) {
            report($th);
            DB::rollback();
            return false;
        }
    }

    public function edit(Request $request)
    {
        DB::beginTransaction();
        try {

            $id = $request->album_id;

            $request->validate([
                'artist' => 'required|integer',
                'name' => 'required',
                'sales_data' => 'required',
                'release_date' => 'required',
                'last_date' => 'required',
                'cover' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
            ]);

            $data = Album::findOrFail($id);
            if ($request->has('cover')) {
                if ($data->cover_path && Storage::disk('public')->exists($data->cover_path)) {
                    Storage::disk('public')->delete($data->cover_path);
                }
                $coverPath = $request->file('cover')->store('covers', 'public');
            }

            $data->artist_id = $request->artist;
            $data->name = $request->name;
            $data->sales_2022 = $request->sales_data;
            $data->date_release = $request->release_date;
            $data->last_update = $request->last_date;
            $data->cover_path = isset($coverPath) ? $coverPath : null;
            $data->save();

            DB::commit();
            return response()->json('success', 200);
        } catch (Throwable $th) {
            report($th);
            DB::rollback();
            return false;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {

            $data = Album::findOrFail($id);
            $data->delete();

            DB::commit();
            return response()->json('success', 200);
        } catch (Throwable $th) {
            report($th);
            DB::rollback();
            return false;
        }
    }
}
