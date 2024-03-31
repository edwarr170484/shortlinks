<?php 

$routes = [
    [
        "method"     => "get",
        "uri"        => "/",
        "controller" => "MainController",
        "handler"    => "index"
    ],
    [
        "method"     => "get",
        "uri"        => "",
        "controller" => "MainController",
        "handler"    => "short"
    ],
    [
        "method"     => "post",
        "uri"        => "/link/edit",
        "controller" => "LinkController",
        "handler"    => "edit"
    ],
    [
        "method"     => "post",
        "uri"        => "/link/delete",
        "controller" => "LinkController",
        "handler"    => "delete"
    ],
    [
        "method"     => "post",
        "uri"        => "/link/short",
        "controller" => "LinkController",
        "handler"    => "short"
    ]
];