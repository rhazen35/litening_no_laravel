<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use App\Core\View;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends Controller
{

    function index($params)
    {
        $connection = (new Database())->connectPDO();
        $loggedIn   = isset($_SESSION['userId']) ? "true" : false;

        if (true === $loggedIn) {

        } else {
            (new View())->render(views() . "login/index.php", $params);
        }
    }
}