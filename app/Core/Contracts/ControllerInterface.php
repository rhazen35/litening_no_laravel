<?php

namespace App\Core\Contracts;

/**
 * Interface ControllerInterface
 */
interface ControllerInterface
{
    /**
     * @param $params
     * @return mixed
     */
    function index($params);
}