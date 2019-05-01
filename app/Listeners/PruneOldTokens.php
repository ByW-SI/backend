<?php

namespace App\Listeners;

// use App\Events\Laravel\Passport\Events\RefreshTokenCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Events\RefreshTokenCreated;

class PruneOldTokens
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
     * @param  RefreshTokenCreated  $event
     * @return void
     */
    public function handle(RefreshTokenCreated $event)
    {
        //
        $oauth_refresh_token = DB::table('oauth_refresh_tokens')
            ->where('id','<>',$event->refreshTokenId)
            ->where('access_token_id','<>',$event->accessTokenId);
        if($oauth_refresh_token){
            $oauth_refresh_token->update(['revoked'=>true]);
        }
    }
}
