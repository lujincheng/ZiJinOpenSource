<?php
// Define a router class
class Router
{
    private $routes = []; // Routing table

    // Add a route method
    public function addRoute($url, $controller, $action)
    {
        // Add the routing information to the routing table
        $this->routes[$url] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    // Routing dispatch method
    public function dispatch($url)
    {
        // Split the URL into an array by '/'
        $urlParts = explode('/', $url);

        // Get the controller and method names. If not set, default to HomeController and index
        $controller = isset($this->routes['/' . $urlParts[1]]) ? $this->routes['/' . $urlParts[1]]['controller'] : 'HomeController';
        $action = isset($this->routes['/' . $urlParts[1]]) ? $this->routes['/' . $urlParts[1]]['action'] : 'index';

        // Get the parameters
        $params = array_slice($urlParts, 2);

        // Generate the controller class name and controller file name based on the controller name
        $controllerClassName = $controller;
        $controllerFileName = '../app/controllers/' . $controller . '.php';

        // If the controller file exists, load the controller class and create an instance
        if (file_exists($controllerFileName)) {
            require_once $controllerFileName;
            $controllerInstance = new $controllerClassName();

            // If the specified method exists in the controller class, call the method. Otherwise, return 404 error.
            if (method_exists($controllerInstance, $action)) {
                if (!empty($params)) {
                    call_user_func_array([$controllerInstance, $action], $params);
                } else {
                    call_user_func([$controllerInstance, $action]);
                }
            } else {
                header('HTTP/1.1 404 Not Found');
                echo '404 Not Found';
            }
        } else {
            header('HTTP/1.1 404 Not Found');
            echo '404 Not Found';
        }
    }
}
