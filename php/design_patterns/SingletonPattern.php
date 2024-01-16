<?php

namespace DesignPatterns;

/**
 * Class SingletonPattern
 *
 * A generic singleton class for demonstrating the singleton pattern.
 */
class SingletonPattern
{

    /**
     * @var SingletonPattern|null The single instance of the class.
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
    public static function getInstance(): SingletonPattern
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}

/** 
 * Example usage:
 * Only the first instance will show
 */
$instance1 = SingletonPattern::getInstance();
$instance2 = SingletonPattern::getInstance();

var_dump($instance1 === $instance2); // Outputs: bool(true)
