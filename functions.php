<?php

function getDatabaseConnection(){
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$db = substr($url["path"], 1);

	$conn = new mysqli($server, $username, $password, $db);
	echo var_dump($conn);
    return $conn;
}

function render($template_name, $item_array){
    $loader = new Twig_Loader_Filesystem(__DIR__.'/templates/');
    $twig = new Twig_Environment($loader, array(
        'cache' => __DIR__.'/template_cache/',
    ));
    $template = $twig->loadTemplate($template_name);
    echo $template->render($item_array);
}