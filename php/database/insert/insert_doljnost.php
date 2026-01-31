<?php

$DoljnostName  = $_POST['DoljnostName'];


// подключаемся к базе
include("../db.php");

// проверка на существование пользователя с таким же логином
$result = mysqli_query($connect, "SELECT idDoljnost FROM `doljnost` WHERE DoljnostName='$DoljnostName' ");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['idDoljnost'])) {
    echo "<script>alert('Введённый вами концерт уже добавлен. Введите другой.')</script>";
} else {
    $result2 = mysqli_query($connect, "INSERT INTO `doljnost` (DoljnostName) VALUES('$DoljnostName')");
    if ($result2 == 'TRUE') {
        echo "<script>alert('Запись добавлена!')</script>";
    } else {
        echo "<script>alert('Ошибка! Запись не добавлена.')</script>";
    }
}
