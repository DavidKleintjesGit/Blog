<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       App()->bind(Newsletter::class, function (){

           $client = new ApiClient();

           $client->setConfig([
               'apiKey' => config('services.mailchimp.key'),
               'server' => 'us13'
           ]);

           return new Newsletter($client);
       });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::shouldBeStrict(app()->isLocal());

        Relation::requireMorphMap();

        Model::unguard();
    }
}
