<?php

namespace CodeUptime\AppVersionLaravel\Console\Version;

use CodeUptime\AppVersionLaravel\Version;
use Illuminate\Console\Command;

class SetInJsonFile extends Command
{
    protected $signature = 'version:set-in-json-file {--file= : the file to set the version in} {--path= : the json path to set the version in}';

    protected $description = 'set the current version in a json file';

    public function handle()
    {
        $filePath = base_path($this->option('file'));
        $jsonPath = $this->option('path');

        // check file exists
        if(!file_exists($filePath)) {
            throw new \InvalidArgumentException("The file does not exist or cannot be read.");
        }

        // get json
        $json = json_decode(file_get_contents($filePath), true);
        data_set($json, $jsonPath, Version::current());

        // write to file
        file_put_contents($filePath, json_encode($json));
    }
}
