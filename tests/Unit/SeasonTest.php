<?php

namespace Tests\Unit;

use App\Models\{Episodes, Seasons};
use Tests\TestCase;

class SeasonTest extends TestCase
{

    /** @var Seasons */
    private $season;

    protected function setup(): void
    {
        parent::setUp();

        $season = new Seasons();

        $episode1 = new Episodes();
        $episode2 = new Episodes();
        $episode3 = new Episodes();

        $episode1->watched = true;
        $episode2->watched = false;
        $episode3->watched = true;

        $season->episodes->add($episode1);
        $season->episodes->add($episode2);
        $season->episodes->add($episode3);

        $this->season = $season;
    }

    public function testSearchForWatchedEpisodes()
    {
        $watchedEpisodes = $this->season->watchedEpisodes();

        $this->assertCount(2, $watchedEpisodes);

        foreach ($watchedEpisodes as $episode) {
            $this->assertTrue($episode->watched);
        }
    }

    public function testSearchEpisodes()
    {
        $episodes = $this->season->episodes;
        $this->assertCount(3, $episodes);
    }
}
