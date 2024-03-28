<?php
namespace Shorts\Controller;

use Shorts\Core\Request;
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
        return $this->render("index.php", ["title" => "Главная страница", "header" => "Мои ссылки", "links" => $this->model->link->findAll()]);
    }
}