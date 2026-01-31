<?php

$Login  = $_POST['Login'];
$Password  = $_POST['Password'];
$Familia  = $_POST['Familia'];
$Name = $_POST['Name'];
$Otchestvo = $_POST['Otchestvo'];
$idDoljnost = $_POST['idDoljnost'];

// подключаемся к базе
include("../db.php");

// проверка на существование пользователя с таким же логином
$result = mysqli_query($connect, "SELECT id_Sotrudniki FROM `sotrudniki` WHERE `Login`='$Login' and `Password`='$Password' and Familia='$Familia' and `Name`='$Name' and Otchestvo='$Otchestvo' and idDoljnost='$idDoljnost';");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['id_Sotrudniki'])) {
    echo "<script>alert('Введённый вами концерт уже добавлен. Введите другой.')</script>";
} else {
    $result2 = mysqli_query($connect, "INSERT INTO `sotrudniki` (`Login`,AES_ENCRYPT(`Password`,'mysecretkey'),Familia,`Name`,Otchestvo,idDoljnost,idRole) VALUES('$Login','$Password','$Familia','$Name','$Otchestvo','$idDoljnost');");
    if ($result2 == 'TRUE') {
        echo "<script>alert('Запись добавлена!')</script>";
    } else {
        echo "<script>alert('Ошибка! Запись не добавлена.')</script>";
    }
}
