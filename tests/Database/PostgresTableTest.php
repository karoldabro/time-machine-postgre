<?php

namespace Kdabrow\TimeMachinePostgres\Tests\Database;

use Kdabrow\TimeMachine\Database\Column;
use Kdabrow\TimeMachinePostgres\Database\PostgresTable;
use Kdabrow\TimeMachinePostgres\Tests\Mocks\ClassThatExtendsModel;
use Kdabrow\TimeMachinePostgres\Tests\TestCase;

class PostgresTableTest extends TestCase
{
    /** @test */
    public function it_selects_all_fields_from_given_table_based_on_model()
    {
        $table = new PostgresTable();

        $result = $table->selectUpdatableFields(new ClassThatExtendsModel());

        $this->assertCount(4, $result);
        $this->assertInstanceOf(Column::class, $result['column_1']);
        $this->assertInstanceOf(Column::class, $result['column_3']);
        $this->assertInstanceOf(Column::class, $result['updated_at']);
        $this->assertInstanceOf(Column::class, $result['created_at']);
    }
}