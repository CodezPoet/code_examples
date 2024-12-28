<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\AiAnswer;

/**
 * @extends ServiceEntityRepository<AnswersAi>
 *
 * @method AiPhrasesAskedTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method AiPhrasesAskedTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method AiPhrasesAskedTable[]    findAll()
 * @method AiPhrasesAskedTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AiAnswerRepository extends ServiceEntityRepository
{
    /**
     * Constructor
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AiAnswer::class);
    }

    /**
     * Save AI answer to table if doesn't exist
     * 
     * @param array $dataToStore
     * 
     * @return void
     */
    public function setDataToStore(array $dataToStore)
    {
        foreach ($dataToStore as $data) {
            $existingValue = $this->findOneBy(['phrase' => $data]);
            if (!$existingValue) {
                $answersAi = new AiAnswer();
                $answersAi->setPhrase($data);
                $this->_em->persist($answersAi);
            }
        }

        $this->_em->flush();
    }
}
