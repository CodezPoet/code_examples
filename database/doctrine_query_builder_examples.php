<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\WpPhrase;

/**
 *  Doctrine QueryBuilder Examples 
 */
class WpPhraseRepository extends ServiceEntityRepository
{
    // set property
    private $aiWordLimit;

    /**
     * Constructor
     * 
     *  @param ManagerRegistry $registry
     * @param mixed $aiWordLimit
     */
    public function __construct(ManagerRegistry $registry, $aiWordLimit)
    {
        parent::__construct($registry, WpPhrase::class);
        $this->aiWordLimit = $aiWordLimit;
    }

    /**
     * Save converted wp titles as two word phrase
     * Only save if does not exist in table
     * 
     * @param array $data
     * 
     * @return void
     */
    public function saveFromArray(array $data): void
    {
        foreach ($data as $item) {
            $existingEntity = $this->findOneBy(['phrase' => $item]);
            if (!$existingEntity) {
                $entity = new WpPhrase();
                $entity->setPhrase($item);
                $this->_em->persist($entity);
            }
        }

        $this->_em->flush();
    }

    /**
     * Get the top x (20) records that haven't been asked before
     * 
     * @return array
     */
    public function findTop20PhrasesNotAsked(): array
    {
        return $this->createQueryBuilder('wp_phrase')
            ->select('wp_phrase.phrase')
            ->leftJoin('App\Entity\AiAsked', 'ai_asked', 'WITH', 'ai_asked.phrase = wp_phrase.phrase')
            ->where('ai_asked.id IS NULL')
            ->setMaxResults($this->aiWordLimit)
            ->getQuery()
            ->getResult();
    }
}
