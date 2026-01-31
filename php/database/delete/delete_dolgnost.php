<?php

$idDoljnost = $_GET['idDoljnost'];

include("../db.php");
$delete = mysqli_query($connect, "DELETE FROM `doljnost` WHERE idDoljnost='$idDoljnost'");
if ($delete == 'TRUE') {
    echo "<script>alert('Запись удалена!')</script>";
} else {
    exit("Ошибка! Запись не удалена.");
}
?>