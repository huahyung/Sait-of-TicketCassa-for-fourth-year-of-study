<?php

$idTypeOfTic = $_GET['idTypeOfTic'];

include("../db.php");
$delete = mysqli_query($connect, "DELETE FROM `typeoftic` WHERE idTypeOfTic='$idTypeOfTic'");
if ($delete == 'TRUE') {
    echo "<script>alert('Запись удалена!')</script>";
} else {
    exit("Ошибка! Запись не удалена.");
}
?>