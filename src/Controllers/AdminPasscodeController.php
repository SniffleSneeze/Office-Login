<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\AdminModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AdminPasscodeController extends Controller
{
    private AdminModel $model;

    /**
     * @param AdminModel $model
     */
    public function __construct(AdminModel $model)
    {
        $this->model = $model;
    }

    public function __invoke(Request $request, Response $response, array $args)
    {
        $passcode = $this->model->getPasscode();
        $input = $request->getParsedBody();
        $result = password_verify($input['adminPasscode'], $passcode['passcode']);
        if ($result) {
            $_SESSION['adminLogin'] = true;
            $_SESSION['timestamp'] = $_SERVER['REQUEST_TIME'];
            return $response->withheader('Location','/admin');
        }
        return $response->withheader('Location','/?invalidPasscode');

    }


}