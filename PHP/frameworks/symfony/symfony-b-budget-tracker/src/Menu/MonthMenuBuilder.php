<?php

namespace App\Menu;


use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\Routing\RouterInterface;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MonthMenuBuilder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    private $factory;
    private $router;

    public function __construct(FactoryInterface $factory, RouterInterface $router)
    {
        $this->factory = $factory;
        $this->router = $router;
    }

    public function createMenu(array $menuData): ItemInterface
    {
        $menu = $this->factory->createItem('root');
        foreach ($menuData as $id => $menuItem) {
            $routeName = 'app_monthly_overview';
            $routeParams = ['id' => $menuItem['id'],];
            $menu->addChild(
                $menuItem['period_name'],
                ['uri' => $this->router->generate($routeName, $routeParams)]
            );
        }

        return $menu;
    }
}
