<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistController extends Controller
{
    public function index()
    {
        return view('modules.artist.index');
    }

    public function indexData(Request $request)
    {
        $artist = Artist::where('name', 'like', '%' . $request->search . '%')
            ->orWhere('code', 'like', '%' . $request->search . '%')
            ->get();
        return response()->json($artist);
    }

    public function singleArtist($id)
    {
        $artist = Artist::findOrFail($id);
        return response()->json($artist);
    }

    public function add(Request $request)
    {
        DB::beginTransaction();
        try {

            $request->validate([
                'code' => 'required|unique:artists,code',
                'name' => 'required',
            ]);

            $data = new Artist();
            $data->code = $request->code;
            $data->name = $request->name;
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

            $id = $request->artist_id;
            $data = Artist::findOrFail($id);

            $request->validate([
                'code' => 'required|unique:artists,code,'.$data->id,
                'name' => 'required',
            ]);

            $data->name = $request->name;
            $data->code = $request->code;
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

            $data = Artist::findOrFail($id);
            $data->delete();

            DB::commit();
            return response()->json('success', 200);
        } catch (Throwable $th) {
            report($th);
            DB::rollback();
            return false;
        }
    }

    public function getAll()
    {
        $artist = Artist::all();
        return response()->json($artist,200);
    }
}
