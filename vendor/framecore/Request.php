<?php 
namespace Shorts\Core;

class Request
{
    private array $get;
    public array $post;
    private array $server;
    private array $files;
    private array $params;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->files = $_FILES;
        $this->params = [];
    }

    public function get(string $value): string | array | null
    {
        return isset($this->get[$value]) ? $this->get[$value] : null;
    }

    public function post(string $value): string | array | null
    {
        return isset($this->post[$value]) ? $this->post[$value] : null;
    }

    public function server(string $value):string | array | null
    {
        return isset($this->server[$value]) ? $this->server[$value] : null;
    }

    public function files(string $value):string | array | null
    {
        return isset($this->files[$value]) ? $this->files[$value] : null;
    }

    public function method(): string
    {
        return strtolower($this->server('REQUEST_METHOD'));
    }

    public function uri(): string
    {
        return explode("?", $this->server('REQUEST_URI'))[0];
    }

    public function domain(): string
    {
        $protocol = $this->server('HTTPS');

        if(isset($protocol))
        {
            $domain = ($protocol && $protocol != "off") ? "https" : "http";
        }
        else{
            $domain = 'http';
        }
        return $domain . "://" . $this->server('SERVER_NAME');
    }

    public function params(): array
    {
        $params = explode("?", $this->server('REQUEST_URI'));
        
        parse_str ($params[1], $this->params);
        
        return $this->params;
    }
}