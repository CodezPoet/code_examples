<?php

namespace App\Repository;

use Doctrine\ORM\Query;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\WpContent;

/**
 * Repository for interacting with the WpContentTable entities.
 *
 * @method AiPhrasesAskedTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method AiPhrasesAskedTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method AiPhrasesAskedTable[]    findAll()
 * @method AiPhrasesAskedTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WpContentRepository extends ServiceEntityRepository
{
    /**
     * Constructor 
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WpContent::class);
    }

    /**
     * Get all post titles from the database
     * 
     * @return array
     */
    public function getAllPostTitles()
    {
        $query =  $this->createQueryBuilder('wp')
            ->select('wp.ID, wp.post_title')
            ->getQuery();

        return $query->getResult(Query::HYDRATE_ARRAY);
    }
}
