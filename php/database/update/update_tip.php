<?php

$idTip  = $_GET['idTip'];
$Info  = $_GET['Info'];
$ReturnBack  = $_GET['ReturnBack'];
$NumTicket = $_GET['NumTicket'];
include("../db.php");
$result = mysqli_query($connect, "UPDATE `tip` SET  Info='$Info' , ReturnBack='$ReturnBack' , NumTicket='$NumTicket' WHERE idTip='$idTip'");
if ($result == 'TRUE') {
    echo "<script>alert('Запись изменена!')</script>";
} else {
    echo "<script>alert('Ошибка! Запись не изменена.')</script>";
}

?>