<?php

class Router
{
    private $routes;

    public function __construct()
    {
            $routesPath = ROOT.'/config/routes.php';
            $this->routes = include($routesPath);
    }

    // Return URI:
    private function getURI()
    {
        $request_uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        if(isset($request_uri))
        {
            return trim($request_uri, '/');
        }
    }

    public function run()
    {
        // Get URI:
        $uri = $this->getURI();
        // Check request:
        foreach($this->routes as $uriPattern => $path)
        {
            // Compare $uriPattern with $uri:
            if(preg_match("~$uriPattern~", $uri))
            {
                $internal_route = preg_replace("~$uriPattern~", $path, $uri);
                $params = explode('/', $internal_route);
                $controllerName = ucfirst(array_shift($params).'Controller');
                $actionName = 'action'.ucfirst(array_shift($params));

                // Create Controller object and call action:
                $controllerObject = new $controllerName();
                $result = call_user_func_array(array($controllerObject, $actionName), $params);
            }
            if(isset($result))
            {
                break;
            }
        }
    }
}