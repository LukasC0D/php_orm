<?php

use models\Product;

require_once "./bootstrap.php";

$rootDir = '/php_orm';

// Login

session_start();
if (
    isset($_POST['login'])
    && !empty($_POST['username'])
    && !empty($_POST['password'])
) {
    if (
        $_POST['username'] === 'admin' &&
        $_POST['password'] === 'admin'
    ) {
        $_SESSION['logged-in'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $_POST['username'];
    } else {
        print('<script type="text/javascript">alert("Wrong username or password.");</script>');
    }
}

// Logout

if (isset($_GET['action']) == 'logout') {
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['logged-in']);
    session_destroy();
    print('<script type="text/javascript">alert("You have been logged out successfully.");</script>');
    header('Location:' . $rootDir . '/admin');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .box{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
        }
        .fPx{
            margin-left: 5px;
        } 
        .fs-12{
            font-size: 12px;
        }
        body{
            background-color: rgb(250, 250, 255);
        }
        table{
            width: 100%;
        }
        table td, table th {
            border: 1px solid rgb(255, 240, 240);
            padding: 10px;
        }
        table tr:nth-child(even){
            background-color: #f4f4ff;
        }
        table tr:hover{
            background-color: rgb(234, 242, 255);
        }
        table th {
            background-color: #686979;
            color: azure;
            padding: 12px;
        }
  
    </style>
    <title>Admin page</title>
</head>
<body>
    <div class="container">
        <?php
        if (!isset($_SESSION['logged-in'])) {
            print('<div class="box">
                    <div class="d-flex justify-content-center">
                        <h3 class="red">Please Log In</h3>
                    </div>
                    <form method = "post">
                        <div class="pb-2">
                            <label class="pe-2" for="username">Username<br></label>
                            <input class="rounded text-center" type="text" id="username" name="username"  placeholder="admin" required autofocus></br>
                        </div>
                        <div class="pb-2 fPx">
                            <label class="pe-2 for="password">Password<br></label>
                            <input class="rounded text-center" type="password" id="password" name="password" placeholder="admin" required><br>
                        </div>
                        <div class="d-flex justify-content-end"><button class="btn text-white btn-dark fs-12" type="submit" name="login">Login</button></div>
                    </form>
                 </div>');
        } else {
            print('<header class="card text-center">
                        <nav class="card-header">
                          <ul class="nav nav-pills card-header-pills d-flex justify-content-between" >
                            <li><a  href="./admin">Admin</a></li>
                            <li><a href="./">View Project</a></li>
                            <li><a class="btn btn-dark fs-12" href=?action=logout>Logout</a></li>      
                         </ul>
                        </nav>
                    </header>');
            print('<table>
            <tr>
                <th>Page</th>
                <th>Actions</th>
            </tr>');


            
            $nav = $entityManager->getRepository("models\Product")->findAll();

            foreach ($nav as $link) {

                print('<tr>
                       <td>' . $link->getPageName() . '</td>');
            }
            print('</table>');

            print('<form class="new-entry" action="" method="POST">
                    <button type="submit" name="add-page">Add New Page</button>
                </form>');

            // Add page

            if (isset($_POST['add-page'])) {
                print('<form class="page-mod" action="" method="POST">
                        <label for="title">Title</label><br>
                        <input type="text" name="new-title" class="title-input"><br>
                        <label for="content">New Content</label><br>
                        <textarea name="new-content" cols="100" rows="30"></textarea><br>
                        <button type="submit" name="add-content">Create Page</button>
                   </form>');
            }
            if (isset($_POST['add-content'])) {
                $title = $_POST['new-title'];
                $content = $_POST['new-content'];
                if (!empty($title)) {
                    $newPage = new Product();
                    $newPage->setPageName($title);
                    $newPage->setPageContent($content);
                    $entityManager->persist($newPage);
                    $entityManager->flush();
                    header('Location:' . $rootDir . '/admin');
                }
            }
        }

        ?>
    </div>
</body>

</html>