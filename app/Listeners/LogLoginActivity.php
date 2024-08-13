<?php

namespace App\Listeners;

use App\Models\UserActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogLoginActivity
{
    /**
     * Create the event listener.
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Login $event)
    {
        UserActivity::create([
            'user_id' => $event->user->id,
            'ip_address' => $this->request->ip(),
            'type' => 'Connexion',
            'occurred_at' => Carbon::now(),
        ]);
    }

}
