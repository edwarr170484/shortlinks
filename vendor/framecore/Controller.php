<?php 
namespace Shorts\Core;

use Shorts\Core\Response;
use Shorts\Core\Config;
use Shorts\Core\Application;
use Shorts\Core\Session;

class Controller
{
    protected Session $session;
    protected $model;

    public function __construct()
    {
        $this->session = Application::$session;
        $this->model = new \stdClass();
    }

    protected function loadModel(string $model, string $className = NULL)
    {
        $className = $className ? (array)$className : explode('\\', $model);
        $this->model->{strtolower($className[count($className) - 1])} = new $model();
    }

    public function render(string $view, array $params): Response
    {
        $content = $this->renderView($view, $params);

        $response = new Response($content);
        $response->addHeader('Content-Type: text/html');

        return $response;
    }

    public function renderView(string $view, array $params): string | null
    {
        ob_start();
        
        if(count($params) > 0)
        {
            foreach($params as $k => $v) {
                $$k = $v;
            }
        }
        
        include(Application::$config->root . "/src/Views/" . $view);

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function renderRaw($data)
    {
        return $data;
    }

    public function json($data)
    {
        $response = new Response(json_encode($data));
        $response->addHeader('Content-Type: application/json');

        return $response;
    }

    public function redirect($redirect)
    {
        $response = new Response();
        $response->addHeader("Location: " . $redirect);
        exit();
    }
}