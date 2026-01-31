<?php

$idTip = $_GET['idTip'];

include("../db.php");
$delete = mysqli_query($connect, "DELETE FROM `tip` WHERE idTip='$idTip'");
if ($delete == 'TRUE') {
    echo "<script>alert('Запись удалена!')</script>";
} else {
    exit("Ошибка! Запись не удалена.");
}
?>