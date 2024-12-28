<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PeriodTransactionRepository;
use App\Repository\RecordsTransactionRepository;
use App\Menu\MonthMenuBuilder;
use App\Service\MonthlyOverviewService;

class MonthlyOverviewController extends AbstractController
{

    public function __construct(
        public RecordsTransactionRepository $recordsTransactionRepository,
        public EntityManagerInterface $entityManager,
        public PeriodTransactionRepository $periodTransactionRepository,
        public MonthlyOverviewService $monthlyOverviewService
    ) {
    }

    #[Route('/overview/monthly', name: 'app_monthly_overview')]
    public function index(Request $request, MonthMenuBuilder $monthMenuBuilder): Response
    {
        $id = $request->query->get('id');
        $selectedMonth = $this->monthlyOverviewService->showCurrentOrSelectedMonth($id);
        $results = $this->recordsTransactionRepository->findByPeriodName($selectedMonth);
        $menuData = $this->periodTransactionRepository->getDistinctMonths();
        $monthMenu = $monthMenuBuilder->createMenu($menuData);

        return $this->render('monthly_overview/index.html.twig', [
            'results' => $results,
            'selectedMonth' => $selectedMonth,
            'monthMenu' => $monthMenu,
        ]);
    }
}
