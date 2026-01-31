<?php

$id_Sotrudniki = $_GET['id_Sotrudniki'];

include("../db.php");
$delete = mysqli_query($connect, "DELETE FROM `sotrudniki` WHERE id_Sotrudniki='$id_Sotrudniki'");
if ($delete == 'TRUE') {
    echo "<script>alert('Запись удалена!')</script>";
} else {
    exit("Ошибка! Запись не удалена.");
}
?>