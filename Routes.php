<?php

//print_r($_SERVER['REQUEST_URI'].'<br>');
$request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : ''; 
$script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : ''; 
//print_r($request_url.'<br>');
//print_r($script_url.'<br>');

$url = ''; 

// Get our url path and trim the / of the left and the right
if($request_url != $script_url) $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');

// Split the url into segments
//$segments = explode('/', $url); 
//var_dump ($segments);
//print_r('<br>'.$url.'<br>');

$route = new Route;
// addGet ili addPost ubacuju elmente u get ili post niz unutar routera
$route->addGet('/tabela', "Table@prokazi_podatke");
$route->addGet('/', "Index@main");
$route->addPost('/dodaj_polisu', "Forma@dodaj");
// addGet ili addPost ubacuju elmente u get ili post niz unutar routera

$route->dispatch();

?>