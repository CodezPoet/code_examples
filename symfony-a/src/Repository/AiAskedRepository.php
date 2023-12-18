<?php

namespace App\Repository;

use App\Entity\AiAsked;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AiPhrasesAskedTable>
 *
 * @method AiPhrasesAskedTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method AiPhrasesAskedTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method AiPhrasesAskedTable[]    findAll()
 * @method AiPhrasesAskedTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AiAskedRepository extends ServiceEntityRepository
{
    /**
     * Constructor
     * 
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AiAsked::class);
    }

    /**
     * Save to asked after running Api request
     * 
     * @param array $data
     * 
     * @return void
     */
    public function saveToAsked(array $data)
    {
        foreach ($data as $item) {
            $existingEntity = $this->findOneBy(['phrase' => $item]);
            if (!$existingEntity) {
                $entity = new AiAsked();
                $entity->setPhrase($item);
                $this->_em->persist($entity);
            }
        }

        $this->_em->flush();
    }
}
