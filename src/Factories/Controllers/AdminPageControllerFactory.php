<?php

namespace App\Factories\Controllers;

use App\Controllers\AdminPageController;
use App\Models\VisitorModel;
use Psr\Container\ContainerInterface;

class AdminPageControllerFactory
{

    public function __invoke(ContainerInterface $container): AdminPageController
    {
        $model = $container->get('VisitorModel');
        $renderer = $container->get('renderer');
        return new AdminPageController($model, $renderer);
    }
}