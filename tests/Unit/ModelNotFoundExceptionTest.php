<?php

namespace Tests\Firevel\Firequent\Unit;

use Firevel\Firequent\ModelNotFoundException;
use Tests\Firevel\Firequent\TestCase;

class ModelNotFoundExceptionTest extends TestCase
{
    public function testWithoutModel()
    {
        $ex = new ModelNotFoundException();

        $this->assertEmpty($ex->getIds());
        $this->assertNull($ex->getModel());

        $this->assertEmpty($ex->getMessage());
        $this->assertEquals(0, $ex->getCode());
        $this->assertNull($ex->getPrevious());
    }

    public function testWithModel()
    {
        $model = TestCase::class;
        $ex = (new ModelNotFoundException())
            ->setModel($model);

        $this->assertEmpty($ex->getIds());
        $this->assertEquals($model, $ex->getModel());

        $this->assertEquals("No query results for model [{$model}].", $ex->getMessage());
        $this->assertEquals(0, $ex->getCode());
        $this->assertNull($ex->getPrevious());
    }

    public function testWithModelAndId()
    {
        $model = TestCase::class;
        $ex = (new ModelNotFoundException())
            ->setModel($model, 1234);

        $this->assertEquals([1234], $ex->getIds());
        $this->assertEquals($model, $ex->getModel());

        $this->assertEquals("No query results for model [{$model}] 1234", $ex->getMessage());
        $this->assertEquals(0, $ex->getCode());
        $this->assertNull($ex->getPrevious());
    }

    public function testWithModelAndIdList()
    {
        $model = TestCase::class;
        $ex = (new ModelNotFoundException())
            ->setModel($model, [1234, '5533', 'steve']);

        $this->assertEquals([1234, '5533', 'steve'], $ex->getIds());
        $this->assertEquals($model, $ex->getModel());

        $this->assertEquals("No query results for model [{$model}] 1234, 5533, steve", $ex->getMessage());
        $this->assertEquals(0, $ex->getCode());
        $this->assertNull($ex->getPrevious());
    }
}
