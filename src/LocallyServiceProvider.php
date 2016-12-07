<?php
namespace Smartisan\Locally;

use Illuminate\Support\ServiceProvider;

class LocallyServiceProvider extends ServiceProvider
{
    /**
     * Application bootstrap.
     */
    public function boot()
    {
        $timestamp = date('Y_m_d_His', time());

        $this->publishes([
            __DIR__ . '/../database/migrations/add_locale_to_users.php' =>
                database_path('migrations/' . $timestamp . '_add_locale_to_users.php')
        ], 'migrations');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('locally', function () {
            return new Locally();
        });
    }
}