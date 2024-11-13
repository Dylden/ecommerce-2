<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../controller/OrderController.php');
require_once('../controller/ErrorController.php');


// récupère l'url actuelle
$requestUri = $_SERVER['REQUEST_URI'];

// découpe l'url actuelle pour ne récupérer que la fin
// si l'url demandée est "http://localhost:8888/piscine-ecommerce-app/public/test"
// $enduri contient "test"
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/ecommerce2/public/', '', $uri);
$endUri = trim($endUri, "/");


// en fonction de la valeur de $endUri on charge le bon contrôleur
 if ($endUri === "create-order") {
    $orderController = new OrderController();
    $orderController->createOrder();
} else if ($endUri === "add-product") {
    $orderController = new OrderController();
    $orderController->addProduct();
}else if ($endUri === "remove-product"){
     $createOrder->removeProduct();
 } else if ($endUri === "shipping-address") { //url pour accéder à la page de shipping-address
     $orderController = new OrderController();
     $orderController->setShippingAddress();
 } else {
    $errorController = new ErrorController();
    $errorController->notFound();
}

