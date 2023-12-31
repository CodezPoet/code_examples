<?php

namespace App\Service;

use App\Repository\PeriodTransactionRepository;

class MonthlyOverviewService
{
    public function __construct(
        public PeriodTransactionRepository $periodTransactionRepository
    ) {
    }

    public function showCurrentOrSelectedMonth(int $id = null): string
    {
        if (!empty($id)) {
            $month = $this->periodTransactionRepository->findByPeriodId($id);
        } else {
            $month = date('F');
        }

        return $month;
    }
}
