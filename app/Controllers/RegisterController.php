<?php

Namespace App\Controllers;

use App\Core\Controller;
use App\Core\View; 

/**
 * Register Controller Class.
 */
class Registercontroller extends Controller {
    
    /**
     * Index.
     *
     * @param array $params
     * @return mixed
     */
    function index(array $params) {
        return (new View())->render(views() . "login/register.php", $params);
    }
}