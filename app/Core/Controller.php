<?php

namespace App\Core;

use App\Core\Contracts\ControllerInterface;

/**
 * Class Controller
 * @package App\Core
 */
abstract class Controller implements ControllerInterface
{
    /**
     * @param $params
     * @return mixed
     */
    abstract function index($params);
}