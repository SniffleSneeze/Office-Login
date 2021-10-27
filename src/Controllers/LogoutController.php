<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LogoutController
{
    public function __invoke(Request $request, Response $response){
        session_destroy();
        return $response->withHeader('Location', '/');
    }

}