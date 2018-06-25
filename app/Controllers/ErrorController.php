<?php

Namespace App\Controllers;

use App\Core\Controller;
use App\Core\View; 

class ErrorController extends Controller {
    
    function index($params) {

    }

    function page404($params) {
        (new View())->render(views() . "errors/404.php", $params + [
            'message'    => "Controller File Not Found!",
            'controller' => $params['data']['controller'],
            'method'     => $params['data']['method'],
            ]);
    }
}