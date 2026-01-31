<?php


$id_Sotrudniki  = $_GET['id_Sotrudniki'];
$Login  = $_GET['Login'];
$Password  = $_GET['Password'];
$Familia  = $_GET['Familia'];
$Name = $_GET['Name'];
$Otchestvo = $_GET['Otchestvo'];
$idDoljnost = $_GET['idDoljnost'];
$idRole = $_GET['idRole'];


include("../db.php");
$result = mysqli_query($connect, "UPDATE `sotrudniki` SET `Login`='$Login' , cast(aes_decrypt(`password`,'mysecretkey')as char)='$Password' , Familia='$Familia' , `Name`='$Name' , Otchestvo='$Otchestvo' ,idDoljnost='$idDoljnost', idRole='$idRole' WHERE id_Sotrudniki='$id_Sotrudniki'");
if ($result == 'TRUE') {
    echo "<script>alert('Запись изменена!')</script>";
} else {
    echo "<script>alert('Ошибка! Запись не изменена.')</script>";
}

?>