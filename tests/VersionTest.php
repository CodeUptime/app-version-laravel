<?php

namespace Tests;

use CodeUptime\AppVersionLaravel\Version;
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
        $app['config']->set('version.base_path', realpath(__DIR__ . "/resources/"));
    }

    public function testVersionHelper()
    {
        $this->assertNotNull(version());
        $this->assertEquals("2.0.0", version());
    }

    public function testVersionCurrent()
    {
        $version = Version::current();
        $this->assertNotNull($version);
        $this->assertEquals("2.0.0", $version);
    }

    public function testVersionComposer()
    {
        $version = Version::composer();
        $this->assertNotNull($version);
        $this->assertEquals("2.0.0", $version);
    }

    public function testVersionPackage()
    {
        $version = Version::package();
        $this->assertNotNull($version);
        $this->assertEquals("1.0.0", $version);
    }

    public function testVersionInfo()
    {
        $info = Version::info();
        $this->assertNotNull($info);
        $this->assertInstanceOf(\stdClass::class, $info);
        $this->assertEquals("2.0.0", $info->composer);
        $this->assertEquals("1.0.0", $info->package);
    }
}
