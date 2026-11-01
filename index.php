<?php
require __DIR__ . '/src/View.php';
require __DIR__ . '/src/Product.php';
require __DIR__ . '/src/ProductRepository.php';
require __DIR__ . '/src/Cart.php';
require __DIR__ . '/src/Router.php';

session_start();
$router = new Router();
$router->dispatch();
