<?php

//print_r($_SERVER['REQUEST_URI']);

$route = new Route;
// addGet ili addPost ubacuju elmente u get ili post niz unutar routera
$route->addGet('/tabela', "Table@prokazi_podatke");
$route->addGet('/', "Index@main");
$route->addPost('/dodaj_polisu', "Forma@dodaj");
// addGet ili addPost ubacuju elmente u get ili post niz unutar routera

$route->dispatch();

?>