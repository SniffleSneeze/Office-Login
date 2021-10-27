<?php

namespace App\Factories\Models;

use App\Models\AdminModel;


class AdminModelFactory
{
    public function __invoke($container): AdminModel
    {
        $db = $container->get('db');
        return new AdminModel($db);
    }

}