<?php

namespace Kdabrow\TimeMachinePostgres\Tests;

use Kdabrow\TimeMachinePostgres\Providers\TimeMachinePostgresProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            TimeMachinePostgresProvider::class,
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}