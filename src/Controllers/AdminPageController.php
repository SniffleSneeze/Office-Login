<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\VisitorModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class AdminPageController extends Controller
{
    private VisitorModel $model;
    private PhpRenderer $renderer;

    public function __construct($model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {

            if ($_SESSION['adminLogin'] === true) {
                $visitors = $this->model->getVisitors();
                return $this->renderer->render($response, 'adminPage.phtml', ['visitors' => $visitors]);
            }
            $_SESSION['adminLogin'] = false;
            return $response->withHeader('Location', '/');

    }
}
