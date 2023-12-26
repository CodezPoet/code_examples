<?php

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(): ItemInterface
    {
        $menu = $this->factory->createItem('root');
        $menu->addChild('Home', ['route' => 'app_home']);
        $menu->addChild('Monthly Overview', ['route' => 'app_monthly_overview']);
        $menu->addChild('Transactions', ['route' => 'app_records_transaction_index']);
        $menu->addChild('Periods', ['route' => 'app_period_transaction_index']);
        $menu->addChild('Categories', ['route' => 'app_category_transaction_index']);
        $menu->addChild('Payees', ['route' => 'app_payee_transaction_index']);
        $menu->addChild('Types', ['route' => 'app_type_transaction_index']);
        $menu->addChild('Years', ['route' => 'app_year_transaction_index']);
        $menu->addChild('Logout', ['route' => 'app_logout']);

        return $menu;
    }
}
