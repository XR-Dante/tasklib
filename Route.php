<?php

declare(strict_types=1);

require_once "Src/Views/Login.php";

require "vendor/autoload.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =[
  '/'         => 'index.php',
  '/Admin'    => 'Src/Views/addAdmin.php',
  '/Register' => 'Src/Views/Register.php',
  '/Login'    => 'Src/Views/Login.php'
];


if (array_key_exists($uri, $routes)){
  require $routes[$uri];
}else{
  errorCode();
}

function errorCode($code = 404) {
    http_response_code($code);
    require "Src/Views/{$code}.php";

    die();
}


