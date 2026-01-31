<?php

$idConsert = $_GET['idConsert'];

include("../db.php");
$delete = mysqli_query($connect, "DELETE FROM `consert` WHERE idConsert='$idConsert'");
if ($delete == 'TRUE') {
    echo "<script>alert('Запись удалена!')</script>";
} else {
    exit("Ошибка! Запись не удалена.");
}
?>