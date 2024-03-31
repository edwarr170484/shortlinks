<?php
namespace Shorts\Controller;

use Shorts\Core\Request;
use Shorts\Core\Controller;
use Shorts\Core\Application;

use Shorts\Model\Link;

class LinkController extends Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->loadModel(Link::class);
    }

    public function edit(Request $request)
    {
        $message = '';

        if($request->server("REQUEST_METHOD") == "POST")
        {
            $id = $request->post("link-id");
            $name = $request->post("link-name");
            $origin = $request->post("link-origin");
            $short = $request->post("link-short");

            if(!$short)
            {
                $short = $this->generate();

                while($this->model->link->isShortExists($short))
                {
                    $short = $this->generate();
                }
            }

            if($id)
            {
                $result = $this->model->link->edit([$name, $origin, $short, $id]);
                $message = "Ссылка успешно сохранена";
            }
            else
            {
                $result = $this->model->link->add([$name, $origin, $short]);
                $message = "Ссылка успешно добавлена";
            }

            $list = $this->renderView("list.php", ["server" => $request->domain(), "links" => $this->model->link->findAll()]);

            return $this->json(['message' => $message, 'error' => 0, 'list' => $list]);
        }

        try
        {
                $single = $this->model->link->find($request->get("id"));

                return $this->json($single);
        }
        catch(\Throwable $e)
        {
            return $this->json([]);
        }
    }

    public function delete(Request $request)
    {
        if($request->server("REQUEST_METHOD") == "POST")
        {
            try
            {
                $result = $this->model->link->delete($request->post("id"), Application::$config->root);

                $list = $this->renderView("list.php", ["server" => $request->domain(), "links" => $this->model->link->findAll()]);

                return $this->json(['message' => 'Ссылка успешно удалена', 'error' => 0, 'list' => $list]);
            }
            catch(\Throwable $e)
            {
                return $this->json(['message' => $e->getMessage(), 'error' => 1]);
            }
        }

        return $this->json(['message' => '', 'error' => 1]);
    }

    public function exists(Request $request)
    {
        $short = $request->post("link-short");

        return $this->json(["exists" => $this->model->link->isShortExists($short)]);
    }

    public function short(Request $request)
    {
        $short = $this->generate();

        while($this->model->link->isShortExists($short))
        {
            $short = $this->generate();
        }

        return $this->json(["short" => $short]);
    }

    private function generate()
    {
        $result = '';

        $today = new \DateTime("now");

        $code = md5($today->format("d.m.Y H:i:s"));

        $length = strlen($code) - 1;

        $symbols = str_split($code);

        $limit = rand(5, 9);

        for($i = 0; $i < $limit; $i++)
        {
            $index = rand(0, $length);
            $result .= $symbols[$index];
        }

        return $result;
    }
}