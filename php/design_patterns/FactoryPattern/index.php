<?php

use App\DesignPatterns\FactoryPattern\PlanFactory;

/**
 * Example Usage of Factory Pattern
 *
 * This code demonstrates the usage of the Factory Pattern to create a plan using the PlanFactory.
 *
 *  @package App\DesignPatterns
 */

// Instantiate the PlanFactory
$planFactory = new PlanFactory;

// Create a plan of type 'free' using the PlanFactory
$plan = $planFactory->createPlan('pro');

// Get the plan's monthly rate
$rate = $plan->getPlanMonthlyRate();

// Dump the plan and its monthly rate for inspection
var_dump($plan, $rate);
