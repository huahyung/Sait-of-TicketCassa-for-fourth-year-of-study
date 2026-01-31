<?php

$Type  = $_POST['Type'];
$Cost  = $_POST['Cost'];
$Quantity  = $_POST['Quantity'];

include("../db.php");

// проверка на существование пользователя с таким же логином
$result = mysqli_query($connect, "SELECT idTypeOfTic FROM `typeoftic` WHERE Type='$Type' and Cost='$Cost' and Quantity='$Quantity'");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['idConsert'])) {
    echo "<script>alert('Введённый вами концерт уже добавлен. Введите другой.')</script>";
} else {
    $result2 = mysqli_query($connect, "INSERT INTO `typeoftic` (Type,Cost,Quantity) VALUES('$Type','$Cost','$Quantity')");
    if ($result2 == 'TRUE') {
        echo "<script>alert('Запись добавлена!')</script>";
    } else {
        echo "<script>alert('Ошибка! Запись не добавлена.')</script>";
    }
}
