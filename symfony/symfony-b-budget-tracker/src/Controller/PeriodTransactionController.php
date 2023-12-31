<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PeriodTransaction;
use App\Form\PeriodTransactionType;
use App\Repository\PeriodTransactionRepository;

#[Route('/period/transaction')]
class PeriodTransactionController extends AbstractController
{
    #[Route('/', name: 'app_period_transaction_index', methods: ['GET'])]
    public function index(PeriodTransactionRepository $periodTransactionRepository): Response
    {
        return $this->render('period_transaction/index.html.twig', [
            'period_transactions' => $periodTransactionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_period_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $periodTransaction = new PeriodTransaction();
        $form = $this->createForm(PeriodTransactionType::class, $periodTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($periodTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_period_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('period_transaction/new.html.twig', [
            'period_transaction' => $periodTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_period_transaction_show', methods: ['GET'])]
    public function show(PeriodTransaction $periodTransaction): Response
    {
        return $this->render('period_transaction/show.html.twig', [
            'period_transaction' => $periodTransaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_period_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PeriodTransaction $periodTransaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PeriodTransactionType::class, $periodTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_period_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('period_transaction/edit.html.twig', [
            'period_transaction' => $periodTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_period_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, PeriodTransaction $periodTransaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $periodTransaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($periodTransaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_period_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
