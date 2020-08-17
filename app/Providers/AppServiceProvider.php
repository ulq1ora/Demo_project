<?php

namespace App\Providers;

use App\Contact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        view()->composer('*', function($view) {
            $contact = new Contact;
            $contacts = $contact->orderBy('id')->take(30)->get();
            $filtered_contacts = [];
            foreach ($contacts as $contact) {
                if (($contact->type == 'private') && (Auth::id() != $contact->userid)) {
                } elseif (($contact->isExpired() == true)) {
                } else {
                    $filtered_contacts[] = $contact;
                }

                View::share('data', $filtered_contacts);
            }
        });
    }
}
