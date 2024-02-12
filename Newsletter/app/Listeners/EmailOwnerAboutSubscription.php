<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Mail\UserSubscribedMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;



class EmailOwnerAboutSubscription
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserSubscribed $event): void
    {
        DB::table('subscribers')->insert([
            'email' => $event->email
        ]);
        Mail::to($event->email)->send(new UserSubscribedMessage);
    }
}
