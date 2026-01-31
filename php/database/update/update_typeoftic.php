<?php

$idTypeOfTic  = $_GET['idTypeOfTic'];
$Type  = $_GET['Type'];
$Cost  = $_GET['Cost'];
$Quantity  = $_GET['Quantity'];

include("../db.php");
$result = mysqli_query($connect, "UPDATE `typeoftic` SET Type='$Type' , Cost='$Cost' , Quantity='$Quantity' WHERE idTypeOfTic='$idTypeOfTic'");
if ($result == 'TRUE') {
    echo "<script>alert('Запись изменена!')</script>";
} else {
    echo "<script>alert('Ошибка! Запись не изменена.')</script>";
}

?>