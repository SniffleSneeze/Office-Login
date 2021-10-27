<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\Models\VisitorModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class SignOutSearchController extends Controller
{
    private VisitorModel $model;
    private PhpRenderer $renderer;

    /**
     * SignOutSearchController constructor.
     * @param VisitorModel $model
     * @param PhpRenderer $renderer
     */
    public function __construct(VisitorModel $model, PhpRenderer $renderer)
    {
        $this->model = $model;
        $this->renderer = $renderer;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $name = $request->getParsedBody();
        $data['visitors'] = $this->model->getVisitorByName($name);
        return $this->renderer->render($response, 'guestSignOut.phtml', $data);
    }


}