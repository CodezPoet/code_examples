<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\RecordsTransaction;
use App\Form\RecordsTransactionType;
use App\Repository\RecordsTransactionRepository;

#[Route('/records/transaction')]
class RecordsTransactionController extends AbstractController
{
    #[Route('/', name: 'app_records_transaction_index', methods: ['GET'])]
    public function index(RecordsTransactionRepository $recordsTransactionRepository): Response
    {
        $records_transactions = $recordsTransactionRepository->findCustomData();
 
        return $this->render('records_transaction/index.html.twig', [
            'records_transactions' => $records_transactions
        ]);
    }

    #[Route('/new', name: 'app_records_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $recordsTransaction = new RecordsTransaction();
        $form = $this->createForm(RecordsTransactionType::class, $recordsTransaction);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($recordsTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_records_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('records_transaction/new.html.twig', [
            'records_transaction' => $recordsTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_records_transaction_show', methods: ['GET'])]
    public function show(RecordsTransaction $recordsTransaction): Response
    {
        return $this->render('records_transaction/show.html.twig', [
            'records_transaction' => $recordsTransaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_records_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RecordsTransaction $recordsTransaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RecordsTransactionType::class, $recordsTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_records_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('records_transaction/edit.html.twig', [
            'records_transaction' => $recordsTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_records_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, RecordsTransaction $recordsTransaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $recordsTransaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($recordsTransaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_records_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
