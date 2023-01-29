<?php

namespace Tests\Console\Version;

use CodeUptime\AppVersionLaravel\VersionServiceProvider;

class VersionTest extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    protected function getPackageProviders($app)
    {
        return [
            VersionServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('version.base_path', realpath(__DIR__ . "/../../scenario/"));
    }

    public function testCurrentCommandReturnsExpectedVersion()
    {
        $this->artisan('version')
            ->assertSuccessful()
            ->expectsOutputToContain("2.0.0");
    }
}
