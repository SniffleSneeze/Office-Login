<?php


namespace App\Factories\Controllers;


use App\Controllers\SignOutController;
use Psr\Container\ContainerInterface;

class SignOutControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('VisitorModel');
        $renderer = $container->get('renderer');
        $controller = new SignOutController($model, $renderer);
        return $controller;
    }

}