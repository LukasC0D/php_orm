<?php

use Models\Product;

require_once "./bootstrap.php";

$newPageName = $argv[1];
$newPageContent = $argv[2];

$newPage = new Product();
$newPage->setPageName($newPageName);
$newPage->setPageContent($newPageContent);
$entityManager->persist($newPage);
$entityManager->flush();