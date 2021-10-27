<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\Models\VisitorModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class SignOutController extends Controller
{
    private PhpRenderer $renderer;

    public function __construct(VisitorModel $model, PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        return $this->renderer->render($response, "guestSignOut.phtml");
    }


}