<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeTransaction;
use App\Form\TypeTransactionType;
use App\Repository\TypeTransactionRepository;

#[Route('/type/transaction')]
class TypeTransactionController extends AbstractController
{
    #[Route('/', name: 'app_type_transaction_index', methods: ['GET'])]
    public function index(TypeTransactionRepository $typeTransactionRepository): Response
    {
        return $this->render('type_transaction/index.html.twig', [
            'type_transactions' => $typeTransactionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typeTransaction = new TypeTransaction();
        $form = $this->createForm(TypeTransactionType::class, $typeTransaction);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typeTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_type_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_transaction/new.html.twig', [
            'type_transaction' => $typeTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_transaction_show', methods: ['GET'])]
    public function show(TypeTransaction $typeTransaction): Response
    {
        return $this->render('type_transaction/show.html.twig', [
            'type_transaction' => $typeTransaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeTransaction $typeTransaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypeTransactionType::class, $typeTransaction);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_type_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('type_transaction/edit.html.twig', [
            'type_transaction' => $typeTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, TypeTransaction $typeTransaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $typeTransaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($typeTransaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_type_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
