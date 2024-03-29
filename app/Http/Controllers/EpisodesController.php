<?php

namespace App\Http\Controllers;

use App\Models\Seasons;
use App\Models\Episodes;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\view;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class EpisodesController extends Controller
{
    /**
     * Display a list of episodes
     *
     * @param Seasons $season
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Seasons $season, Request $request): View
    {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'seasonId' => $season->id,
            'message' => $request->session()->get('message')
        ]);
    }

    /**
     * Mark episode as watch
     *
     * @param Seasons $season
     * @param Request $request
     * @return RedirectResponse
     */
    public function watch(Seasons $season, Request $request): RedirectResponse
    {
        $watchEpisodes = $request->episodes;

        $season->episodes->each(
            function (Episodes $episode) use ($watchEpisodes) {
                $episode->watched = in_array($episode->id, $watchEpisodes);
            }
        );

        $season->push();

        $request->session()
            ->flash('message', "Episodes was marked as watched");

        return redirect()->back();
    }
}
