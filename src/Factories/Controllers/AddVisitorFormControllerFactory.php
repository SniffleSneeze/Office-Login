<?php

namespace App\Factories\Controllers;

use App\Controllers\AddVisitorFormController;

class AddVisitorFormControllerFactory
{
    public function __invoke($container)
    {
        $model = $container->get('VisitorModel');
        return  new AddVisitorFormController($model);
    }
}