<?php

namespace App\Providers;

use App\Enums\SMSPRovidersEnum;
use App\Services\GhasedakSMSProvider;
use App\Services\Interfaces\IMessageService;
use App\Services\Interfaces\ISMSProviderFactory;
use App\Services\Interfaces\ISMSSender;
use App\Services\KavenegarSMSProvider;
use App\Services\MessageService;
use App\Services\SMSProviderFactory;
use App\Services\SMSSender;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(ISMSSender::class, SMSSender::class);


        $this->app->bind(ISMSProviderFactory::class, SMSProviderFactory::class);
        $this->app->bind(IMessageService::class, MessageService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
