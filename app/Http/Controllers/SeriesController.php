<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Services\SeriesService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{RedirectResponse, Request};

class SeriesController extends Controller
{
    /**
     * @var SeriesService
     */
    private $seriesService;

    public function __construct(SeriesService $seriesService)
    {
        $this->seriesService = $seriesService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $series = $this->seriesService->all();
        $message = $request->session()->get('message');

        return view('series.index', compact('series', 'message'));
    }

    /**
     * Create new series
     *
     * @return View
     */
    public function create(): View
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SeriesFormRequest $request
     * @return RedirectResponse
     */
    public function store(SeriesFormRequest $request): RedirectResponse
    {

        $serie = $this->seriesService->createSerie(
            $request->seriesName,
            $request->seriesDescription,
            $request->seriesSeasons,
            $request->seriesEpisodes
        );

        $request->session()
            ->flash(
                'message',
                "Series {$serie->seriesName} was created!!"
            );

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $serie = Series::find($id);
        $newName = $request->name;
        $serie->name = $newName;
        $serie->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        $serieName = $this->seriesService->removeSeries($request->id);

        $request->session()->flash(
            'message',
            "Serie {$serieName} was removed"
        );

        return redirect()->route('index');
    }
}
