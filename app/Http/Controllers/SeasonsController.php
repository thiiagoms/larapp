<?php

namespace App\Http\Controllers;

use App\Models\Series;

class SeasonsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $series = Series::find($id);
        $seasons = $series->seasons;

        return view('seasons.index', compact('seasons', 'series'));
    }
}
