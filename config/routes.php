<?php 

$routes = [
    [
        "method"     => "get",
        "uri"        => "/",
        "controller" => "MainController",
        "handler"    => "index"
    ],
    [
        "method"     => "post",
        "uri"        => "/link/edit",
        "controller" => "LinkController",
        "handler"    => "edit"
    ]
];