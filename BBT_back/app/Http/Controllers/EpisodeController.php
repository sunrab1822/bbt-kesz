<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function index(){
        $episodes = Episode::all();

        return response()->json($episodes);
    }

    public function getSeasonsByid($id){
        $episodes = Episode::where('season', $id)->get();

        return response()->json($episodes);
    }
}

