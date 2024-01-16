<?php

namespace App\DesignPatterns\FactoryPattern\Plans;

use App\DesignPatterns\FactoryPattern\MasterPlan;

/**
 * Class ProPlan
 *
 * Represents a Pro Plan in the FactoryPattern namespace.
 * Extends the MasterPlan class.
 *
 * @package App\DesignPatterns\FactoryPattern\Plans
 */
class ProPlan extends MasterPlan
{
    /**
     * The rate for the Pro Plan.
     */
    private $planMonthlyRate = 150;
    /**
     * Array of features included in the Pro Plan.
     *
     * @var array
     */
    protected array $features = ['4CPU', '32Gb Mem', '500Gb SSD Storage', '24/7 Support'];

    /**
     * Get the rate for the Pro Plan.
     *
     * @return int The rate for the Pro Plan.
     */
    public function getPlanMonthlyRate(): int
    {
        return $this->planMonthlyRate;
    }
}
