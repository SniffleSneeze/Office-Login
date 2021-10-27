<?php

namespace App\Factories\Controllers;

use App\Abstracts\Controller;
use App\Controllers\AddVisitorController;
use Psr\Container\ContainerInterface;

class AddVisitorControllerFactory
{
    public function __invoke(ContainerInterface $container): AddVisitorController
    {
        $renderer = $container->get('renderer');
        return new AddVisitorController($renderer);
    }
}