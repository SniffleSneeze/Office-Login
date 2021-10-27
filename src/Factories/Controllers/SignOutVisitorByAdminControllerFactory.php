<?php

namespace App\Factories\Controllers;

use App\Controllers\SignOutVisitorByAdminController;
use Psr\Container\ContainerInterface;

class SignOutVisitorByAdminControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('VisitorModel');
        return new SignOutVisitorByAdminController($model);
    }
}