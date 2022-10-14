<?php
ob_start();

require_once "./bootstrap.php";

$request = $_SERVER['REQUEST_URI'];

$rootDir = '/php_orm';

switch ($request) {
    case $rootDir:
    case $rootDir . '/':
    case $rootDir . '/?pageId=' . (isset($_GET['pageId']) ? $_GET['pageId'] : null):
        require __DIR__ . '/src/views/home.php';
        break;
     default:
        http_response_code(404);
        require __DIR__ . '/src/views/404.php';
        break;
}