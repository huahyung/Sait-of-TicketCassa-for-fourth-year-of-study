<?php
session_start();
include("../database/db.php");
?>
<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Панель администратора</title>
       <link rel="stylesheet" href="/css/adm.css">
</head>

<body>

   
    <div class="container-fluid">
        <div >
            <nav id="sidebarMenu">
                <div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index_admin.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Главная страница
                            </a>
                        </li>

                        <h6>
                            <span>Справочники</span>
                            <a class="link-secondary" href="#">
                            </a>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link" href="conserts.php" target="iframeBootstrap">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Справочник "Концерты"
                            </a>
                        </li>
                      <li class="nav-item">
                            <a class="nav-link" href="ticket.php" target="iframeBootstrap">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Справочник "Билеты"
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="typeoftic.php" target="iframeBootstrap">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Справочник "Виды билетов"
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doljnost.php" target="iframeBootstrap">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Справочник "Должности"
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sotrudniki.php" target="iframeBootstrap">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Справочник "Сотрудники"
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tips.php" target="iframeBootstrap">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Справочник "Чеки"
                            </a>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php" target="iframeBootstrap">
                                <span data-feather="layers" class="align-text-bottom"></span>
                                Справочник "Пользователи"
                            </a>
                        </li>
                        
                    

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                                <span>Отчеты</span>
                                <a class="link-secondary" href="#">
                                </a>
                        </h6>
                    </ul>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle='modal' data-bs-target='#Modal'>
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Проданные билеты одним кассиром
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle='modal' data-bs-target='#Modal2'>
                                <span data-feather="file-text" class="align-text-bottom"></span>
                                Проданные билеты по концерту
                            </a>
                        </li>
                    </ul>


                    
                </div>
            </nav>
 
          

           
                    
</body>

</html>