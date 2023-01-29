<?php

namespace CodeUptime\AppVersionLaravel;

use CodeUptime\AppVersionLaravel\Console\Version\Current;
use CodeUptime\AppVersionLaravel\Console\Version\Info;
use \CodeUptime\AppVersionLaravel\Version;
use Illuminate\Support\ServiceProvider;

class VersionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/version.php', 'version');

        $this->app->bind('codeuptime_version', function ($app) {
            return new Version();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Current::class,
                Info::class,
            ]);
        }
    }
}
