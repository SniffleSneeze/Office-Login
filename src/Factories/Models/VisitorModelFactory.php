<?php

namespace App\Factories\Models;

use App\Models\VisitorModel;

class VisitorModelFactory
{
    public function __invoke($container): VisitorModel
    {
        $db = $container->get('db');
        return new VisitorModel($db);
    }

}