<?php

namespace CodeUptime\AppVersionLaravel\Console\Version;

use Illuminate\Console\Command;

class Current extends Command
{
    protected $signature = 'version';

    protected $description = 'Get the current version';

    public function handle()
    {
        $this->info(version());
    }
}
