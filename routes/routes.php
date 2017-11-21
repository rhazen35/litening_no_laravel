<?php

/**
 * ------------------------------------------
 * All application routes are specified here.
 * Add a new route array to the routes array.
 * ------------------------------------------
 */
function routes()
{
    return [

        [
            'route'      => "home/index",
            'controller' => "HomeController",
            'method'     => "index"
        ],

    ];
}