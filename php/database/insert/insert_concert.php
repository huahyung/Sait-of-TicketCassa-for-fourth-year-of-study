<?php

$Data  = $_POST['Data'];
$Time  = $_POST['Time'];
$Artist  = $_POST['Artist'];
$Adress = $_POST['Adress'];
$Type = $_POST['Type'];
$Place = $_POST['Place'];

// подключаемся к базе
include("../db.php");

// проверка на существование пользователя с таким же логином
$result = mysqli_query($connect, "SELECT idConsert  FROM `consert` WHERE `Data`='$Data' and `Time`='$Time' and Artist='$Artist' and Adress='$Adress' and `Type`='$Type' and Place='$Place';");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['idConsert'])) {
    echo "<script>alert('Введённый вами концерт уже добавлен. Введите другой.')</script>";
} else {
    $result2 = mysqli_query($connect, "INSERT INTO `consert` (`Data`,`Time`,Artist,Adress,`Type`,Place) VALUES('$Data','$Time','$Artist','$Adress','$Type','$Place')");
    if ($result2 == 'TRUE') {
        echo "<script>alert('Запись добавлена!')</script>";
    } else {
        echo "<script>alert('Ошибка! Запись не добавлена.')</script>";
    }
}
