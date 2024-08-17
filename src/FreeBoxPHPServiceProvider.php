<?php

declare(strict_types=1);

namespace madpilot78\LaravelFreeBoxPHP;

use madpilot78\LaravelFreeBoxPHP\Commands\RegisterCommand;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;
use madpilot78\FreeBoxPHP\Box;
use madpilot78\FreeBoxPHP\Configuration;
use madpilot78\FreeBoxPHP\Enum\BoxType;

class FreeBoxPHPServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/freebox.php' => config_path('freebox.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/freebox.php',
            'freebox',
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                RegisterCommand::class,
            ]);
        }
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Box::class, function (Application $app) {
            $token = config('freebox.token');

            return new Box(
                $token,
                new Configuration(
                    appId: config('freebox.appid'),
                    appName: config('freebox.appname'),
                    hostname: config('freebox.hostname'),
                    https: config('freebox.https', true),
                    localAccess: config('freebox.localaccess', true),
                    boxType: BoxType::tryFrom(config('freebox.boxtype', '')) ?? BoxType::Free,
                    logger: $app->get(LoggerInterface::class)->channel(config('freebox.log_channel', 'null')),
                    container: $app,
                    timeout: config('freebox.timeout', 30),
                    tokenTTL: config('freebox.tokenttl', 7200),
                    cacheKeyBase: config('freebox.cachebase', 'madpilot78:FreeBoxPHP:'),
                    cache: app('cache.psr6'),
                    deviceName: config('freebox.devicename'),
                    certFile: config('freebox.certfile', ''),
                ),
            );
        });
    }
}
