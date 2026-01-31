<?php


$Info  = $_POST['Info'];
$ReturnBack  = $_POST['ReturnBack'];
$NumTicket = $_POST['NumTicket'];

// подключаемся к базе
include("../db.php");

// проверка на существование пользователя с таким же логином
$result = mysqli_query($connect, "SELECT idTip FROM `tip` WHERE Info='$Info' and ReturnBack='$ReturnBack' and NumTicket='$NumTicket' ;");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['idTip'])) {
    echo "<script>alert('Введённый вами концерт уже добавлен. Введите другой.')</script>";
} else {
    $result2 = mysqli_query($connect, "INSERT INTO `tip` (Info,ReturnBack,NumTicket) VALUES('$Info','$ReturnBack','$NumTicket');");
    if ($result2 == 'TRUE') {
        echo "<script>alert('Запись добавлена!')</script>";
    } else {
        echo "<script>alert('Ошибка! Запись не добавлена.')</script>";
    }
}
