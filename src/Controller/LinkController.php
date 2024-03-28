<?php
namespace Shorts\Controller;

use Shorts\Core\Request;
use Shorts\Core\Controller;

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
            }
            else
            {
                $result = $this->model->link->add([$name, $origin, $short]);
            }

            $this->redirect("/");
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