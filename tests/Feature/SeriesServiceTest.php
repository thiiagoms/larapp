<?php

namespace Tests\Feature;

use App\Models\Series;
use App\Services\SeriesService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeriesServiceTest extends TestCase
{

    use RefreshDatabase;

    /** @var Series */
    private $serie;

    protected function setUp(): void
    {
        parent::setUp();
        $seriesService = new SeriesService();

        $serieName = "Serie name test";
        $this->serie = $seriesService
            ->createSerie($serieName, "Test Description", 1, 1, null);
    }

    public function testCreateSeries()
    {
        $seriesService = new SeriesService();

        $serieName = "Serie name test";
        $createdSerie = $seriesService
            ->createSerie($serieName, "Test Description", 1, 1, null);

        $this->assertInstanceOf(Series::class, $createdSerie);
        $this->assertDatabaseHas('series', ['name' => $serieName]);
        $this->assertDatabaseHas('seasons', [
            'series_id' => $createdSerie->id,
            'seasons_quantity' => 1
        ]);
        $this->assertDatabaseHas('episodes', ['episodes_quantity' => 1]);
    }

    public function testRemoveOneSerie()
    {
        $this->assertDatabaseHas(
            'series',
            ['id' => $this->serie->id]
        );

        $removeSerie = new SeriesService();
        $nameSerie = $removeSerie->removeSeries($this->serie->id);
        $this->assertIsString($nameSerie);
        $this->assertEquals('Serie name test', $this->serie->name);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
