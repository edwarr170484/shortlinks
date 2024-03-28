<?php

namespace Shorts\Core;

use Shorts\Core\Request;
use Shorts\Core\Response;

class Router
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function resolve(Request $request): Response
    {
        try
        {
            $route = $this->getRouteByUri($request->uri());

            $class = "Shorts\\Controller\\" . $route["controller"];
            $controller = new $class;
            $controller->__construct();
            
            $action = $route['handler'];

            $response = $controller->$action($request);

            return $response;
        }
        catch(\Throwable $e)
        {
            $response = new Response($e->getMessage());
            $response->setStatusCode(404);
            return $response;
        }
    }

    public function getRouteByUri(string $uri): null | array
    {
        $route = null;

        foreach($this->routes as $item){
            if($item["uri"] === $uri){
                $route = $item;
                break;
            }
        }

        return $route;
    }
}