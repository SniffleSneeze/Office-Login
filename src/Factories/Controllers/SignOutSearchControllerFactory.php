<?php


namespace App\Factories\Controllers;


use App\Controllers\SignOutSearchController;
use Psr\Container\ContainerInterface;

class SignOutSearchControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('VisitorModel');
        $renderer = $container->get('renderer');
        $controller = new SignOutSearchController($model, $renderer);
        return $controller;
    }

}