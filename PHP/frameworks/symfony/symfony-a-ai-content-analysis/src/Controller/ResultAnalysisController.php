<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\AiAnswer;

class ResultAnalysisController extends AbstractController
{
    public function __construct(
        public EntityManagerInterface $entityManager
    ) {
    }

    /**
     * Show example of the Analysis result
     * 
     * @return Response
     */
    #[Route('/result/analysis', name: 'app_result_analysis')]
    public function index(): Response
    {
        $aiAnswerRepository = $this->entityManager->getRepository(AiAnswer::class);
        $phrasesEntities = $aiAnswerRepository->findBy(['use_phrase' => 'yes'], ['phrase' => 'ASC']);
        $phrases = [];
        foreach ($phrasesEntities as $entity) {
            if ($entity->getUsePhrase() === 'yes') {
                $phrases[] = $entity->getPhrase();
            }
        }
        return $this->render('result_analysis/index.html.twig', [
            'phrases' => $phrases,
        ]);
    }
}
