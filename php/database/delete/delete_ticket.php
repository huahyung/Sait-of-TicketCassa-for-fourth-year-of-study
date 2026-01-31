<?php

$NumTicket = $_GET['NumTicket'];

include("../db.php");
$delete = mysqli_query($connect, "DELETE FROM `ticket` WHERE NumTicket='$NumTicket'");
if ($delete == 'TRUE') {
    echo "<script>alert('Запись удалена!')</script>";
} else {
    exit("Ошибка! Запись не удалена.");
}
?>