<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\PayeeTransaction;
use App\Form\PayeeTransactionType;
use App\Repository\PayeeTransactionRepository;

#[Route('/payee/transaction')]
class PayeeTransactionController extends AbstractController
{
    #[Route('/', name: 'app_payee_transaction_index', methods: ['GET'])]
    public function index(PayeeTransactionRepository $payeeTransactionRepository): Response
    {
        return $this->render('payee_transaction/index.html.twig', [
            'payee_transactions' => $payeeTransactionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_payee_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $payeeTransaction = new PayeeTransaction();
        $form = $this->createForm(PayeeTransactionType::class, $payeeTransaction);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($payeeTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_payee_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('payee_transaction/new.html.twig', [
            'payee_transaction' => $payeeTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_payee_transaction_show', methods: ['GET'])]
    public function show(PayeeTransaction $payeeTransaction): Response
    {
        return $this->render('payee_transaction/show.html.twig', [
            'payee_transaction' => $payeeTransaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_payee_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PayeeTransaction $payeeTransaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PayeeTransactionType::class, $payeeTransaction);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_payee_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('payee_transaction/edit.html.twig', [
            'payee_transaction' => $payeeTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_payee_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, PayeeTransaction $payeeTransaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $payeeTransaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($payeeTransaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_payee_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
