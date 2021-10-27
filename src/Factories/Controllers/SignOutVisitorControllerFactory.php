<?php

namespace App\Factories\Controllers;

use App\Controllers\SignOutVisitorController;
use Psr\Container\ContainerInterface;

class SignOutVisitorControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('VisitorModel');
        return new SignOutVisitorController($model);
    }
}