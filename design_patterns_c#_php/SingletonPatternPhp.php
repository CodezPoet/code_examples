<?php

namespace DesignPatterns;

/**
 * Class Singleton
 *
 * A generic singleton class for demonstrating the singleton pattern.
 */
class SingletonPatternPhp
{

    /**
     * @var SingletonPatternPhp |null The single instance of the class.
     */
    protected static $instance = null;

    /**
     * Singleton constructor.
     * Private constructor to prevent instantiation.
     */
    private function __construct()
    {
        echo "New instance is created";
    }

    /**
     * Get the single instance of the class.
     *
     * @return Singleton The single instance of the class.
     */
    public static function getInstance(): SingletonPatternPhp
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}
