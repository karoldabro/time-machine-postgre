<?php

namespace Kdabrow\TimeMachinePostgres\Database;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Kdabrow\TimeMachine\Contracts\DatabaseTableInterface;
use Kdabrow\TimeMachine\Database\Column;
use Kdabrow\TimeMachine\Exceptions\TimeMachineException;
use Kdabrow\TimeMachine\TimeTraveller;

class PostgresTable implements DatabaseTableInterface
{
    /**
     * @return array<string, Column> Key is column name, value is Column object
     * @throws TimeMachineException
     */
    public function selectUpdatableFields(TimeTraveller $timeTraveller): array
    {
        $fields = DB::select("select column_name, data_type from INFORMATION_SCHEMA.COLUMNS where table_name = '".$timeTraveller->getModel()->getTable()."'");

        if (empty($fields)) {
            throw new TimeMachineException("Not found any fields in table: " . $timeTraveller->getModel()->getTable());
        }

        $allowedTypes = Config::get('time-machine-postgres.types');

        $columnNames = [];

        foreach ($fields as $field) {
            if (in_array($field->data_type, $allowedTypes) === false) {
                continue;
            }

            $columnNames[$field->column_name] = (new Column($field->column_name))->setType($field->data_type);
        }

        return $columnNames;
    }
}