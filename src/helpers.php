<?php

use \CodeUptime\AppVersionLaravel\Version;

if (!function_exists('version')) {
    function version()
    {
        return Version::current();
    }
}
