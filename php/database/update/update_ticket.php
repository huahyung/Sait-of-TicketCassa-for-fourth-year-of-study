<?php

$NumTicket  = $_GET['NumTicket'];
$DetailsOfTic  = $_GET['DetailsOfTic'];
$Consert_idConsert  = $_GET['Consert_idConsert'];
$idTypeOfTic  = $_GET['idTypeOfTic'];
$id_Sotrudniki = $_GET['id_Sotrudniki'];
include("../db.php");
$result = mysqli_query($connect, "UPDATE `ticket` SET DetailsOfTic='$DetailsOfTic' , Consert_idConsert='$Consert_idConsert' , idTypeOfTic='$idTypeOfTic' , id_Sotrudniki='$id_Sotrudniki' where NumTicket = '$NumTicket'");
if ($result == 'TRUE') {
    echo "<script>alert('Запись изменена!')</script>";
} else {
    echo "<script>alert('Ошибка! Запись не изменена.')</script>";
}

?>