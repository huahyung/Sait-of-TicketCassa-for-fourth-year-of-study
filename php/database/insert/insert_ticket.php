<?php

$DetailsOfTic  = $_POST['DetailsOfTic'];
$Consert_idConsert  = $_POST['Consert_idConsert'];
$idTypeOfTic  = $_POST['idTypeOfTic'];
$id_Sotrudniki = $_POST['id_Sotrudniki'];

// подключаемся к базе
include("../db.php");

// проверка на существование пользователя с таким же логином
$result = mysqli_query($connect, "SELECT NumTicket FROM `ticket` WHERE DetailsOfTic='$DetailsOfTic' and Consert_idConsert='$Consert_idConsert' and idTypeOfTic='$idTypeOfTic' and id_Sotrudniki='$id_Sotrudniki';");
$myrow = mysqli_fetch_array($result);
if (!empty($myrow['NumTicket'])) {
    echo "<script>alert('Введённый вами концерт уже добавлен. Введите другой.')</script>";
} else {
    $result2 = mysqli_query($connect, "INSERT INTO `ticket` (DetailsOfTic,Consert_idConsert,idTypeOfTic,id_Sotrudniki) VALUES('$DetailsOfTic','$Consert_idConsert','$idTypeOfTic','$id_Sotrudniki');");
    if ($result2 == 'TRUE') {
        echo "<script>alert('Запись добавлена!')</script>";
    } else {
        echo "<script>alert('Ошибка! Запись не добавлена.')</script>";
    }
}
