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
            $contacts = $contact->orderBy('id','desc')->take(10)->get();
            $filtered_contacts = [];
            foreach ($contacts as $contact) {
                if ((($contact->type == Contact::TYPE_PRIVATE) || ($contact->type == Contact::TYPE_UNLISTED)) && (Auth::id() != $contact->userid)) {
                } elseif (($contact->isExpired() == true)) {
                } else {
                    $filtered_contacts[] = $contact;
                }
                }
            View::share('data', $filtered_contacts);
        });
    }
}
