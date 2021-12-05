<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    private ?User $user = null;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', function () {


            if (auth()->guest()) {
                return;
            }

            if ($this->user === null) {
                $this->user = auth()->user();

                $this->user->load([
                    'character',
                ]);
            }

            View::share('user', $this->user);
            View::share('character', $this->user->character);

        });

    }
}
