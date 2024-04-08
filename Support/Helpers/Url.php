<?php

namespace Framework\Support\Helpers;

use Framework\Routing\Generator\UrlGenerator;

/**
 * Url facade.
 *
 * @package Framework\Support\Helpers
 * @see UrlGenerator
 */
class Url extends Facade
{
    /**
     * Set the accessor for the facade.
     *
     * @return string
     */
    static protected function accessor(): string
    {
        return UrlGenerator::class;
    }

    /**
     * Generate an absolute URL for the given path with route parameters, optionally excluding the host.
     *
     * @param string $path The path to the resource.
     * @param array $parameters [optional] Route parameters to include in the URL.
     * @param bool $absolute [optional] Whether to exclude the host from the generated URL.
     * @return string The generated absolute URL.
     */
    public static function to(string $path, array $parameters = [], bool $absolute = true): string
    {
        return self::get_accessor_class()->to($path, $parameters, $absolute);
    }

    /**
     * Generate a URL for the given route name.
     *
     * @param string $name The name of the route.
     * @param array $parameters [optional] Parameters to substitute into the route URI.
     * @param bool $absolute [optional] Whether to generate an absolute URL (including scheme and host).
     * @return string The generated URL.
     */
    public static function route(string $name, array $parameters = [], bool $absolute = true): string
    {
        return self::get_accessor_class()->route($name, $parameters, $absolute);
    }

    /**
     * Get the full base URL for the application.
     *
     * @return string The full base URL for the application. Returns the relative path if 'app.url' is not set.
     */
    public static function full(): string
    {
        return self::get_accessor_class()->full();
    }

    /**
     * Get the current URL.
     *
     * @return string The current URL.
     */
    public static function current(): string
    {
        return self::get_accessor_class()->current();
    }
}