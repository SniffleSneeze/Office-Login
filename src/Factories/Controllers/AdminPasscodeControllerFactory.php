<?php

namespace App\Factories\Controllers;

use App\Controllers\AdminPasscodeController;
use App\Models\AdminModel;
use Psr\Container\ContainerInterface;

class AdminPasscodeControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $model = $container->get('AdminModel');
        return new AdminPasscodeController($model);
    }

}