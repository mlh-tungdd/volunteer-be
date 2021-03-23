<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Services\UserServiceInterface::class,
            \App\Services\UserService::class
        );

        $this->app->singleton(
            \App\Services\BannerServiceInterface::class,
            \App\Services\BannerService::class
        );

        $this->app->singleton(
            \App\Services\CategoryNewsServiceInterface::class,
            \App\Services\CategoryNewsService::class
        );

        $this->app->singleton(
            \App\Services\CategoryAlbumServiceInterface::class,
            \App\Services\CategoryAlbumService::class
        );

        $this->app->singleton(
            \App\Services\NewsServiceInterface::class,
            \App\Services\NewsService::class
        );

        $this->app->singleton(
            \App\Services\SchoolServiceInterface::class,
            \App\Services\SchoolService::class
        );

        $this->app->singleton(
            \App\Services\AlbumServiceInterface::class,
            \App\Services\AlbumService::class
        );

        $this->app->singleton(
            \App\Services\VideoServiceInterface::class,
            \App\Services\VideoService::class
        );

        $this->app->singleton(
            \App\Services\DistrictServiceInterface::class,
            \App\Services\DistrictService::class
        );

        $this->app->singleton(
            \App\Services\EventServiceInterface::class,
            \App\Services\EventService::class
        );

        $this->app->singleton(
            \App\Services\SettingServiceInterface::class,
            \App\Services\SettingService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
