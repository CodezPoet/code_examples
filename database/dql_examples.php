<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\RecordsTransaction;

/**
 * DQL Query Examples
 */
class RecordsTransactionRepository extends ServiceEntityRepository
{
    /**
     * Construct
     * 
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecordsTransaction::class);
    }

    /**
     * Show results from the records table 
     * and additional fields from joined tables
     * 
     * @return array
     */
    public function findCustomData(): array
    {
        $query = $this->getEntityManager()->createQuery('
            SELECT 
                r.id,
                r.nameTransaction,
                r.bedrag,
                r.payment_day,
                p.payee_name,
                q.period_name
            FROM App\Entity\RecordsTransaction r
            JOIN r.payee_name p
            JOIN r.period_name q
            ORDER BY r.id ASC
        ');

        return $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

    /**
     * Show results from the records table and other tables 
     * based on the Period name chosen e.g. month name
     * Join several tables to get all the data needed
     * Use parameter functionality for protection and security 
     * 
     * @param string $periodName
     * 
     * @return array
     */
    public function findByPeriodName(string $periodName): array
    {
        $query = $this->getEntityManager()->createQuery('
            SELECT 
            r.id,
            r.nameTransaction,
            r.bedrag,
            r.payment_day,
            q.payee_name,
            p.period_name
            FROM App\Entity\RecordsTransaction r
            JOIN r.payee_name q
            JOIN r.period_name p
            WHERE p.period_name = :periodName
            ORDER BY r.id ASC
        ');
        $query->setParameter('periodName', $periodName);

        $records = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return $records;
    }
}
