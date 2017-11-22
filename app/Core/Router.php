<?php

namespace App\Core;

/**
 * Class Router
 * @package App\Core
 */
class Router
{
    /**
     * @param $request
     */
    function resolve($request)
    {
        // Check if the request is set
        if (isset($request)) {

            // Clean the request by trimming whitespace and filter sanitize the url(request)
            $cleanRequest = filter_var(rtrim($request, '/'), FILTER_SANITIZE_URL);

            // Split the url into parts
            $requestParts = explode("/", str_replace(publicDir(), "", $cleanRequest));

            // Get the controller and method from the request parts
            $controller = isset($requestParts[0]) ? $requestParts[0] : null;
            $method     = isset($requestParts[1]) ? $requestParts[1] : null;

            // Unset the controller and method request parts, leaving the params.
            unset($requestParts[0]);
            unset($requestParts[1]);

            // Set the route name
            $routeName = implode("/", [$controller, $method]);

            // Set matching route to null
            $matchingRoute = null;

            // Loop trough the routes and find a matching route(name)
            foreach (routes() as $route) {
                if ($route['route'] === $routeName) {
                    $matchingRoute = $route;
                    break;
                }
            }

            // Request the given route if the matching route isn't null
            if (null !== $matchingRoute) {
                $this->request($matchingRoute, $requestParts);
            } else {

                //TODO: Error Response message
            }

        } else {

            //TODO: Error Response message
        }
    }

    /**
     * @param $route
     * @param $params
     */
    function request($route, $params)
    {
        // Create the dynamic file name
        $fileName = rootDir() . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "Controllers"
            . $route['controller'] . '.php';

        // Check if the file exists
        if (file_exists($fileName)) {

            // Include the dynamic controller
            include $fileName;
        } else {

            //TODO: Error Response message
        }

        // Set the dynamic controller namespace and instantiate the dynamic controller
        $controller =  "\\App\\Controllers\\" . $route['controller'];

        // Check if the dynamic controller exists
        if (class_exists($controller)) {

            // Instantiate the dynamic controller
            $controller = new $controller;

            // Check if the method exists
            if (method_exists($controller, $route['method'])) {

                // Run the dynamic method of the controller with the params
                $controller->{$route['method']}($params);
            } else {

                //TODO: Error Response message
            }
        } else {

            //TODO: Error Response message
        }
    }
}