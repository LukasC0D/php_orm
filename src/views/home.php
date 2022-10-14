<?php

use models\Product;

require_once "./bootstrap.php";

$page = $entityManager->getRepository("models\Product")->findAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="welcome-top">
        </div>
        <header>
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <?php
                        foreach ($page as $link) {
                            $IdRef = null;
                            if ($link->getId() === 1) {
                                $IdRef = './';
                            } else {
                                $IdRef = '?pageId=' . $link->getId();
                            }
                            $active = '';

                            if(isset($_GET['pageId'])) {
                                if($_GET['pageId'] == $link->getId())
                                    $active = 'active';
                            } else {
                                if($link->getId() == 1)
                                 $active = 'active';
                            }
                            print('<li class="nav-item">
                                       <a class="nav-link ' . $active . '" href="' . $IdRef . '">' . $link->getPageName() . '</a>
                                  </li>');     
                        }
                        ?>
                    </ul>
                </div>
                <div class="card-body">
                    <h2 class="card-text">Content management system</h2>
                </div>
            </div>
        </header>
        <?php
        if ($_SERVER['REQUEST_URI'] === ($rootDir . '/')) {
            $content = $entityManager->find('models\Product', 1);
            print('<h3 class="text-center pt-2">' . $content->getPageName() . '</h3>');
            print('<h5 class="text-center pt-2">' . $content->getPageContent() . '</h5>');
        } else if (isset($_GET['pageId'])) {
            $content = $entityManager->find('models\Product', $_GET['pageId']);
            print('<h3 class="text-center pt-2">' . $content->getPageName() . '</h3>');
            print('<h5 class="text-center pt-2">' . $content->getPageContent() . '</h5');
        }
        ?>
    </div>
</body>

</html>