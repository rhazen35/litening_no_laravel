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
     * @param array $params
     * @return mixed
     */
    function index(array $params);
}