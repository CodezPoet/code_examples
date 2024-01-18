<?php

namespace App\DesignPatterns\FactoryPattern;

/**
 * Class MasterPlan
 *
 * Abstract class representing a Master Plan in the FactoryPattern namespace.
 * All concrete plan classes should extend this class.
 *
 * @package App\DesignPatterns\FactoryPattern
 */
abstract class MasterPlan
{
    /**
     * Array of features included in the Master Plan.
     *
     * @var array
     */
    protected array $features = [];

    /**
     * Get the rate for the Master Plan. This method must be implemented by concrete plan classes.
     *
     * @return int The rate for the Master Plan.
     */
    abstract public function getPlanMonthlyRate(): int;

    /**
     * Get the features of the Master Plan.
     *
     * @return array The features of the Master Plan.
     */
    public function getFeatures(): array
    {
        return $this->features;
    }
}
