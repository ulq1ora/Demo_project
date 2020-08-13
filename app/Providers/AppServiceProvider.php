<?php

namespace App\Providers;

use App\Contact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $contact = new Contact;
        View::share('data', $contact->orderBy('id', 'asc' )->take(10)->get());
    }
}
