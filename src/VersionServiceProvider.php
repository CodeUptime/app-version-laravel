<?php

namespace CodeUptime\AppVersionLaravel;

use \CodeUptime\AppVersionLaravel\Version;
use Illuminate\Support\ServiceProvider;

class VersionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('codeuptime_version', function ($app) {
            return new Version();
        });
    }
}
