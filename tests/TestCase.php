<?php

namespace DmitryIvanov\DarkSkyApi\Tests;

use Exception;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;

Mockery::globalHelpers();

class TestCase extends MockeryTestCase
{
    /**
     * Assert that the object has the given class as one of its parents or implements it.
     *
     * @param  object|string  $object
     * @param  string  $class
     * @return void
     */
    protected function assertSubclassOf($object, $class)
    {
        $isSubclassOf = is_subclass_of($object, $class);

        $this->assertTrue($isSubclassOf);
    }

    /**
     * Set an expectation for the exception.
     *
     * Provides backward compatibility with the PHPUnit 4 and PHPUnit 5.
     *
     * @param  \Exception  $exception
     * @return void
     */
    protected function isExpectingException(Exception $exception)
    {
        if (method_exists($this, 'expectExceptionObject')) {
            $this->expectExceptionObject($exception);
            return;
        }

        if (method_exists($this, 'setExpectedException')) {
            $this->setExpectedException(get_class($exception), $exception->getMessage(), $exception->getCode());
            return;
        }

        $this->expectException(get_class($exception));
        $this->expectExceptionCode($exception->getCode());
        $this->expectExceptionMessage($exception->getMessage());
    }
}
