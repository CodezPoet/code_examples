<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\CategoryTransaction;
use App\Form\CategoryTransactionType;
use App\Repository\CategoryTransactionRepository;

#[Route('/category/transaction')]
class CategoryTransactionController extends AbstractController
{

    #[Route('/', name: 'app_category_transaction_index', methods: ['GET'])]
    public function index(CategoryTransactionRepository $categoryTransactionRepository): Response
    {
        return $this->render('category_transaction/index.html.twig', [
            'category_transactions' => $categoryTransactionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_category_transaction_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $categoryTransaction = new CategoryTransaction();
        $form = $this->createForm(CategoryTransactionType::class, $categoryTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($categoryTransaction);
            $entityManager->flush();

            return $this->redirectToRoute('app_category_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('category_transaction/new.html.twig', [
            'category_transaction' => $categoryTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_category_transaction_show', methods: ['GET'])]
    public function show(CategoryTransaction $categoryTransaction): Response
    {
        return $this->render('category_transaction/show.html.twig', [
            'category_transaction' => $categoryTransaction,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_category_transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategoryTransaction $categoryTransaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CategoryTransactionType::class, $categoryTransaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_category_transaction_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('category_transaction/edit.html.twig', [
            'category_transaction' => $categoryTransaction,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_category_transaction_delete', methods: ['POST'])]
    public function delete(Request $request, CategoryTransaction $categoryTransaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $categoryTransaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($categoryTransaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_category_transaction_index', [], Response::HTTP_SEE_OTHER);
    }
}
