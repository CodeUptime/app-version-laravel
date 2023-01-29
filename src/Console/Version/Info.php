<?php

namespace CodeUptime\AppVersionLaravel\Console\Version;

use CodeUptime\AppVersionLaravel\Version;
use Illuminate\Console\Command;

class Info extends Command
{
    protected $signature = 'version:info';

    protected $description = 'Shows all current version infromation available';

    public function handle()
    {
        // prepare output
        $tableContents = [];
        foreach ((array)Version::info() as $key => $version) {
            $tableContents[] = [$key, $version];
        }

        // show table of version info
        $this->table(
            ['Source', 'Version'],
            $tableContents
        );
    }
}
