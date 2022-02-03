<?php

namespace App\Services;

use App\Models\{Series, Seasons, Episodes};
use Illuminate\Support\Facades\DB;

class SeriesService
{
    /**
     * Series model
     *
     * @var Series
     */
    private Series $series;

    /**
     * Dependency injection
     *
     * @param Series $series
     */
    public function __construct()
    {
        $this->series = new Series();
    }

    public function all()
    {
        return $this->series->all();
    }

    /**
     * Create new Serie
     *
     * @param string $serie
     * @param string $description
     * @param integer $seasonsQuantity
     * @param integer $epsBySeason
     * @return Series
     */
    public function createSerie(string $name, string $description, int $seasonsQuantity, int $epsBySeason): Series
    {
        DB::beginTransaction();

        $serie = Series::create(['name' => $name, 'description' => $description]);
        $this->createSeasons($seasonsQuantity, $epsBySeason, $serie);

        DB::commit();

        return $serie;
    }

    /**
     * Creat new series season
     *
     * @param integer $seasonsQuantity
     * @param integer $epsBySeason
     * @param Series $serie
     * @return void
     */
    private function createSeasons(int $seasonsQuantity, int $epsBySeason, Series $serie): void
    {
        for ($seasons = 1; $seasons <= $seasonsQuantity; $seasons++) {
            $season = $serie->seasons()->create(['seasons_quantity' => $seasons]);
            $this->createEpisodes($epsBySeason, $season);
        }
    }

    /**
     * Add episodes to the season
     *
     * @param integer $epsBySeason
     * @param Seasons $season
     * @return void
     */
    private function createEpisodes(int $epsBySeason, Seasons $season): void
    {
        for ($episode = 1; $episode <= $epsBySeason; $episode++) {
            $season->episodes()->create(['episodes_quantity' => $episode]);
        }
    }

    /**
     * Remove series
     *
     * @param integer $serieId
     * @return string
     */
    public function removeSeries(int $serieId): string
    {

        DB::beginTransaction();

        $serie = Series::find($serieId);
        $seriesName = $serie->name;
        $this->removeSeasons($serie);
        $serie->delete();
        DB::commit();

        return $seriesName;
    }

    /**
     * Remove series seasons
     *
     * @param Series $serie
     * @return void
     */
    private function removeSeasons(Series $serie): void
    {
        $serie->seasons()->each(function (Seasons $season) {
            $this->removeEpisodes($season);
            $season->delete();
        });
    }

    /**
     * Remove seasons episodes
     *
     * @param Seasons $season
     * @return void
     */
    private function removeEpisodes(Seasons $season): void
    {
        $season->episodes()->each(function (Episodes $episode) {
            $episode->delete();
        });
    }
}
