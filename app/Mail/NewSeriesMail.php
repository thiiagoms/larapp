<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewSeriesMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /** @var string */
    public $seriesName;

    /** @var string */
    public $seriesDescription;

    /** @var int */
    public $seasons;

    /** @var int */
    public $episodes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $seriesName, string $seriesDescription, int $seasons, int $episodes)
    {
        $this->seriesName = $seriesName;
        $this->seriesDescription = $seriesDescription;
        $this->seasons = $seasons;
        $this->episodes = $episodes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.series.new-series', [
            'seriesName' => $this->seriesName,
            'seriesDescription' => $this->seriesDescription,
            'seasons' => $this->seasons,
            'episodes' => $this->seasons
        ]);
    }
}
