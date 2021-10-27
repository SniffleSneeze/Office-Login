<?php

namespace App\Factories\Controllers;

use App\Controllers\SignOutAllVisitorsByAdminController;
use Psr\Container\ContainerInterface;

class SignOutAllVisitorsByAdminControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('VisitorModel');
        return new SignOutAllVisitorsByAdminController($model);
    }
}