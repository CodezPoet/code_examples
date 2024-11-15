<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\PeriodTransaction;

class PeriodTransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodTransaction::class);
    }

    public function getAvailableMonths(): array
    {
        $dql = 'SELECT DISTINCT p.period_name
                FROM App\Entity\PeriodTransaction p';
        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult();
    }

    public function getDistinctMonths(): array
    {
        $dql = 'SELECT 
                    pt.id, 
                    pt.period_name
                FROM App\Entity\PeriodTransaction pt';
        $query = $this->getEntityManager()->createQuery($dql);

        return $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

    public function findByPeriodId(int $periodId): ?string
    {
        $dql = 'SELECT r.period_name
                FROM App\Entity\PeriodTransaction r
                WHERE r.id = :periodId';
        $result = $this->getEntityManager()
            ->createQuery($dql)
            ->setParameter('periodId', $periodId)
            ->getOneOrNullResult();

        return $result['period_name'] ?? null;
    }
}
