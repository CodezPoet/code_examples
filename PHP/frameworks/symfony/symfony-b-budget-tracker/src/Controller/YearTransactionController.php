<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\YearTransaction;
use App\Form\YearTransactionType;
use App\Repository\YearTransactionRepository;

#[Route('/year/transaction')]
class YearTransactionController extends AbstractController
{
    #[Route('/', name: 'app_year_transaction_index', methods: ['GET'])]
    public function index(YearTransactionRepository $yearTransactionRepository): Response
    {
        return $this->render('year_transaction/index.html.twig', [
            'year_transactions' => $yearTransactionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_year_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $yearTransaction = new YearTransaction();
        $form = $this->createForm(YearTransactionType::class, $yearTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($yearTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_year_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('year_transaction/new.html.twig', [
            'year_transaction' => $yearTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_year_transaction_show', methods: ['GET'])]
    public function show(YearTransaction $yearTransaction): Response
    {
        return $this->render('year_transaction/show.html.twig', [
            'year_transaction' => $yearTransaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_year_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, YearTransaction $yearTransaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(YearTransactionType::class, $yearTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_year_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('year_transaction/edit.html.twig', [
            'year_transaction' => $yearTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_year_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, YearTransaction $yearTransaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $yearTransaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($yearTransaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_year_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
