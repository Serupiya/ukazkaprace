<?php

function getDatabaseConnection(){
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "";
    $db_name = "sweetshop";
    return new mysqli($servername, $username, $password, $db_name);
}

function render($template_name, $item_array){
    $loader = new Twig_Loader_Filesystem(__DIR__.'/templates/');
    $twig = new Twig_Environment($loader, array(
        'cache' => __DIR__.'/template_cache/',
    ));
    $template = $twig->loadTemplate($template_name);
    echo $template->render($item_array);
}