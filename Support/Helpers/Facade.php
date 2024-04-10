<?php

namespace Framework\Support\Helpers;

use Error;
use Framework\Component\Exceptions\BindingResolutionException;
use http\Exception\RuntimeException;

/**
 * Abstract class for creating facades.
 *
 * This class provides a convenient base for creating facades in a framework.
 * A facade is a class that provides a static interface to objects that are
 * available in the application's service container.
 *
 * @package Framework\Support\Helpers
 * @template T
 */
abstract class Facade
{
    /**
     * Get the accessor class name.
     *
     * This method should be implemented by subclasses to return the fully
     * qualified class name of the accessor class that the facade represents.
     *
     * @return class-string<T> The fully qualified class name of the accessor class.
     */
    abstract protected static function accessor(): string;

    /**
     * Get the accessor class instance from the application's service container.
     *
     * This method retrieves an instance of the accessor class from the
     * application's service container using the accessor class name returned
     * by the accessor() method.
     *
     * The accessor's dependencies will be resolved when retrieved from the service container.
     *
     * @return T The instance of the accessor class.
     */
    public static function get_accessor_class()
    {
        if (!class_exists($accessor = static::accessor())) {
            throw new RuntimeException('Class does not exist: ' . $accessor);
        }

        return get_service($accessor);
    }
}
