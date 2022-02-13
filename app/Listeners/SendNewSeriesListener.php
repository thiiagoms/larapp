<?php

namespace App\Listeners;

use App\Events\NewSeriesEvent;
use App\Mail\NewSeriesMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewSeriesListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewSeriesEvent  $event
     * @return void
     */
    public function handle(NewSeriesEvent $event)
    {

        $seriesName = $event->seriesName;
        $seriesDescription = $event->seriesDescription;
        $seasons = $event->seasons;
        $episodes = $event->episodes;

        $users = User::all();

        foreach ($users as $index => $user) {
            $multi = $index + 1;

            $mail = new NewSeriesMail(
                $seriesName,
                $seriesDescription,
                $seasons,
                $episodes
            );

            $mail->subject = "Serie {$seriesName} added";

            // Add 5+ second after
            $when = now()->addSecond($multi * 5);

            \Illuminate\Support\Facades\Mail::to($user)->later($when, $mail);
        }
    }
}
