<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends Controller
{

    function index($params)
    {
        echo 'Home View here please!';

        var_dump(new Database());
    }
}