<?php
namespace Shorts\Controller;

use Shorts\Core\Request;
use Shorts\Core\Response;
use Shorts\Core\Controller;

use Shorts\Model\Link;

class MainController extends Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->loadModel(Link::class);
    }

    public function index(Request $request)
    {
        return $this->render("index.php", ["title" => "Главная страница", "header" => "Мои ссылки", "server" => $request->domain(), "links" => $this->model->link->findAll()]);
    }

    public function short(Request $request)
    {
        try
        {
            $short = substr($request->uri(), 1);
            
            if($short)
            {
                $link = $this->model->link->findByShort($short);

                if($link)
                {
                    $stat = $link["stat"] + 1;

                    $this->model->link->stat([$stat, $link["id"]]);

                    $this->redirect($link["origin"]);
                }
            }
        }
        catch(\Throwable $e){}
        finally
        {
            $response = new Response($this->renderView("errors/404.php", ["title" => "Ссылка не найдена", "server" => $request->domain(), "message" => "Такая ссылка не найдена в нашей базе. Внимательно проверьте ссылку и попробуйте еще раз"]));
            $response->setStatusCode(404);
            
            return $response;
        }
    }
}