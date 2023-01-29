<?php

namespace CodeUptime\AppVersionLaravel\Facades;

use Illuminate\Support\Facades\Facade;

class Version extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'codeuptime_version';
    }
}
