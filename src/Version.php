<?php

namespace CodeUptime\AppVersionLaravel;

class Version
{
    public static function current()
    {
        // check composer.json for version
        $composerJson = json_decode(file_get_contents(base_path('composer.json')));
        $composerVersion = data_get($composerJson, 'version');
        if ($composerVersion) {
            return $composerVersion;
        }

        // check package.json for version
        $packageJson = json_decode(file_get_contents(base_path('package.json')));
        $packageVersion = data_get($composerJson, 'version');
        if ($packageVersion) {
            return $packageVersion;
        }
    }
}
