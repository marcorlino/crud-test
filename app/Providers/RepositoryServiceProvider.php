<?php

namespace App\Providers;

use App\Services\Admin\Contact\ContactInterface;
use App\Services\Admin\Contact\ContactService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //register both files in repositories folder
        //contact service repository
        $this->app->bind(ContactInterface::class, ContactService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
