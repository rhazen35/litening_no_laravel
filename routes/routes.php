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
        // Root route to home.
        [
            'route'      => "/",
            'controller' => "HomeController",
            'method'     => "index"
        ],

        // 404 Not found route.
        [
            'route'      => "404",
            'controller' => "errorController",
            'method'     => "404"
        ],

        [
            'route'      => "home/index",
            'controller' => "HomeController",
            'method'     => "index"
        ],

    ];
}