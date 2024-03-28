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
        "uri"        => "/album/delete",
        "controller" => "AlbumController",
        "handler"    => "delete"
    ]
];