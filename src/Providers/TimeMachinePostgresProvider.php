<?php

namespace Kdabrow\TimeMachinePostgres\Providers;

use Illuminate\Support\ServiceProvider;
use Kdabrow\TimeMachine\Contracts\DatabaseTableInterface;
use Kdabrow\TimeMachinePostgres\Database\PostgresTable;

class TimeMachinePostgresProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/time-machine-postgres.php', 'time-machine-postgres');

        $this->app->bind(DatabaseTableInterface::class, PostgresTable::class);
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/time-machine-postgres.php' => config_path('time-machine-postgres.php'),
        ], 'time-machine-postgres.config');
    }
}