<?php

$idConsert  = $_GET['idConsert'];
$Data  = $_GET['Data'];
$Time = $_GET['Time'];
$Artist = $_GET['Artist'];
$Adress = $_GET['Adress'];
$Type = $_GET['Type'];
$Place = $_GET['Place'];


include("../db.php");
$result = mysqli_query($connect, "UPDATE `consert` SET `Data`='$Data', `Time`='$Time', Artist='$Artist', Adress='$Adress', `Type`='$Type', Place = '$Place' WHERE idConsert='$idConsert'");
if ($result == 'TRUE') {
    echo "<script>alert('Запись изменена!')</script>";
} else {
    echo "<script>alert('Ошибка! Запись не изменена.')</script>";
}

?>