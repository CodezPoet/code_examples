<?php

namespace App\DesignPatterns\FactoryPattern;

/**
 * Class PlanFactory
 *
 * Factory class for creating Plan objects based on a given plan type.
 *
 * @package App\DesignPatterns\FactoryPattern
 */
class PlanFactory
{
    /**
     * Create a Plan object based on the provided plan type.
     *
     * @param string $plan The plan type. Default is 'free'.
     *
     * @return Plan The created Plan object.
     *
     * @throws \InvalidArgumentException If the specified plan type is invalid.
     */
    public function createPlan($planName = 'free'): MasterPlan
    {
        $planName = ucfirst($planName);
        $allowedPlans = ['Free', 'Pro']; 

        if (!in_array($planName, $allowedPlans)) {
            throw new \InvalidArgumentException('Invalid plan type specified');
        }

        $className = "App\\DesignPatterns\\FactoryPattern\\Plans\\" . $planName . "Plan";

        if (!class_exists($className)) {
            throw new \Exception('A class with the name ' . $className . ' could not be found');
        }

        return new $className();
    }
}
