<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\VisitorModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SignOutVisitorController extends Controller
{
    private VisitorModel $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $name = $request->getParsedBody();
        $this->model->signOutVisitor($name);
        return $response->withHeader('Location', '/');

    }
}