<?php

namespace App\Core\Contracts;

/**
 * Interface ControllerInterface
 */
interface ControllerInterface
{
    /**
     * Index.
     * 
     * @param $params
     * @return mixed
     */
    function index($params);
}