<?php

namespace App\DesignPatterns\FactoryPattern\Plans;

use App\DesignPatterns\FactoryPattern\MasterPlan;

/**
 * Class Plan
 *
 * Represents a Free Plan in the FactoryPattern namespace.
 * Extends the MasterPlan class.
 *
 * @package App\DesignPatterns\FactoryPattern\Plans
 */
class FreePlan extends MasterPlan
{
    /**
     * The rate for the Free Plan.
     */
    private $planMonthlyRate = 0;

    /**
     * Array of features included in the Free Plan.
     *
     * @var array
     */
    protected array $features = ['2CPU', '8Gb Mem', '128Gb SSD Storage', 'Support Paid per Ticket'];

    /**
     * Get the rate for the Free Plan.
     *
     * @return int The rate for the Free Plan.
     */
    public function getPlanMonthlyRate(): int
    {
        return $this->planMonthlyRate;
    }
}
