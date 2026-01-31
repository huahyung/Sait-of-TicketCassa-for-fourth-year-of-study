<?php
    $connect = mysqli_connect('localhost', 'root', '', 'consert_cassa_sait');
    if (!$connect) {
        die('Ошибка подключения к базе данных');
    }
