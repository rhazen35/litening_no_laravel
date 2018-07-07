<?php

Namespace App\Controllers;

use App\Core\Controller;
use App\Core\View; 

/**
 * Error Controller Class.
 */
class ErrorController extends Controller {
    
    /**
     * Index.
     *
     * @param array $params
     * @return void
     */
    function index(array $params) {

    }

    /**
     * Page 404.
     *
     * @param array $params
     * @return void
     */
    function page404(array $params) {
        (new View())->render(views() . "errors/404.php", $params);
    }
}