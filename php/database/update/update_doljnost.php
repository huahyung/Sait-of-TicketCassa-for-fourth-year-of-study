<?php

$idDoljnost  = $_GET['idDoljnost'];
$DoljnostName  = $_GET['DoljnostName'];



include("../db.php");
$result = mysqli_query($connect, "UPDATE `doljnost` SET `DoljnostName`='$DoljnostName' WHERE idDoljnost='$idDoljnost'");
if ($result == 'TRUE') {
    echo "<script>alert('Запись изменена!')</script>";
} else {
    echo "<script>alert('Ошибка! Запись не изменена.')</script>";
}

?>