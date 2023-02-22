<?php

namespace TigerHeck\Vcita;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use TigerHeck\Vcita\Console\VcitaWebhookSubscribeCommand;

class VcitaServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config' => config_path(),
        ], 'config');

        Http::macro('vcita', function () {
            return Http::withToken(config('vcita.api_key'))->baseUrl(config('vcita.base_url'));
        });
    }
    
    public function register()
    {
        $this->registerVcita();
        $this->registerCommand();
    }

    public function provides()
    {
        return ['vcita'];
    }

    protected function registerVcita()
    {
        $this->app->bind('vcita', function ($app) {
            return new VcitaService(config('vcita.base_url'), config('vcita.api_key'));
        });
    }

    protected function registerCommand()
    {
        $this->app->singleton('command.vcita:subscribe', function () {
            return new VcitaWebhookSubscribeCommand;
        });

        $this->commands(['command.vcita:subscribe']);
    }
}
