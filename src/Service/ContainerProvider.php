<?php

namespace App\Service;

use App\Service\Container;
use App\Controller\Backend\Backend;
use App\Controller\FrontendController\DetailControll;
use App\Controller\FrontendController\ErrorControll;
use App\Controller\FrontendController\HomeControll;
use App\Controller\FrontendController\ListControll;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Service\ControllerProvider;
use App\Service\View;
use App\Service\SQLConnector;
use App\Controller\Backend\Login;
use App\Model\UserRepository;

class ContainerProvider
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
        $this->setContainer();
    }

    private function setContainer()
    {
        $tmpContainer = $this->container;
        $this->container->set(
            SQLConnector::class,
            function () use ($tmpContainer) {
                return new SQLConnector();
            }
        );
        $this->container->set(
            View::class,
            function () use ($tmpContainer) {
                return new View();
            }
        );
        $this->container->set(
            ProductRepository::class,
            function () use ($tmpContainer) {
                return new ProductRepository($tmpContainer->get(SQLConnector::class));
            }
        );

        $this->container->set(
            UserRepository::class,
            function () use ($tmpContainer) {
                return new UserRepository($tmpContainer->get(SQLConnector::class));
            }
        );
        $this->container->set(
            ListControll::class,
            function () use ($tmpContainer) {
                    return new ListControll($tmpContainer->get(View::class), $tmpContainer->get(ProductRepository::class));
                }
        );
        $this->container->set(
            HomeControll::class,
            function () use ($tmpContainer) {
                    return new HomeControll($tmpContainer->get(View::class));
                }
        );
        $this->container->set(
            DetailControll::class,
            function () use ($tmpContainer) {
                    return new DetailControll($tmpContainer->get(View::class), $tmpContainer->get(ProductRepository::class));
                }
        );
        $this->container->set(
                Backend::class,
                function () use ($tmpContainer) {
                    return new Backend($tmpContainer->get(View::class), $tmpContainer->get(ProductRepository::class), $tmpContainer->get(ProductEntityManager::class));
                }
        );

        $this->container = $tmpContainer;
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
