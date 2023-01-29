<?php

namespace CodeUptime\AppVersionLaravel;

use Illuminate\Support\Facades\Log;

class Version
{
    public static function info()
    {
        return (object)[
            'composer' => self::composer(),
            'package' => self::package(),
        ];
    }

    public static function current()
    {
        $composer = self::composer();
        if ($composer) {
            return $composer;
        }

        $package = self::package();
        if ($package) {
            return $package;
        }
    }

    public static function composer()
    {
        return self::jsonFile(config('version.base_path') . '/' . ('composer.json'), 'version');
    }

    public static function package()
    {
        return self::jsonFile(config('version.base_path') . '/' . ('package.json'), 'version');
    }

    public static function jsonFile(string $path, string $key)
    {
        try {
            // check package.json for version
            $json = json_decode(file_get_contents($path));
            $version = data_get($json, $key);
            if ($version) {
                return $version;
            }
        } catch (\Throwable $e) {
            Log::debug($e);
        }
    }
}
