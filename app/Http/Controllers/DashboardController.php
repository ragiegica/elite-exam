<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /* return dashboard page */
    public function dashboard()
    {
        return view('modules.dashboard.dashboard');
    }

    /* Display total number of albums sold per artist | Display combined album sales per artist */
    public function totalOverviewPerArtist($artistId)
    {
        $artist = Artist::with('albums')->findOrFail($artistId);
        $totalAlbums = $artist->albums->count();
        $totalSales = $artist->albums->sum('sales_2022');

        $dataDisplay = [
            'artist' => $artist->name,
            'total_albums' => number_format($totalAlbums),
            'total_sales' =>  number_format($totalSales),
        ];

        return response()->json($dataDisplay, 200);
    }

    /* Display the top 1 artist who sold most combined album sales */
    public function topOneArtist()
    {
        $topArtist = Artist::withSum('albums', 'sales_2022')
            ->orderByDesc('albums_sum_sales_2022')
            ->first();

        if ($topArtist) {
            $dataDisplay = [
                'artist' => $topArtist->name,
                'total_sales' => number_format($topArtist->albums_sum_sales_2022),
                'message' => null,
            ];

            return response()->json($dataDisplay, 200);
        } else {
            return response()->json(['message' => 'No top selling artist found.'], 404);
        }
    }
}
