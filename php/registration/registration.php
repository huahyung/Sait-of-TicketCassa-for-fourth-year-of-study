<?php
session_start();

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    if ($login == '') {
        unset($login);
    }
} //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password == '') {
        unset($password);
    }
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($email == '') {
        unset($email);
    }
}
if (isset($_POST['confirm_password'])) {
    $confirm_password = $_POST['confirm_password'];
    if ($confirm_password == '') {
        unset($confirm_password);
    }
}
if (isset($_POST['Familiya'])) {
    $Familiya = $_POST['Familiya'];
    if ($Familiya == '') {
        unset($Familiya);
    }
}
if (isset($_POST['Imya'])) {
    $Imya = $_POST['Imya'];
    if ($Imya == '') {
        unset($Imya);
    }
}

$Otchestvo = $_POST['Otchestvo'];
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($login) or empty($password) or empty($email) or empty($confirm_password) or empty($Familiya) or empty($Imya)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    exit("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

$email = stripslashes($email);
$email = htmlspecialchars($email);

$confirm_password = stripslashes($confirm_password);
$confirm_password = htmlspecialchars($confirm_password);

$Familiya = stripslashes($Familiya);
$Familiya = htmlspecialchars($Familiya);

$Imya = stripslashes($Imya);
$Imya = htmlspecialchars($Imya);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$email = trim($email);
$confirm_password = trim($confirm_password);
$Familiya = trim($Familiya);
$Imya = trim($Imya);

if ($confirm_password == $password) {
    // подключаемся к базе
    include("../database/db.php"); // файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

    // проверка на существование пользователя с таким же логином
    $result = mysqli_query($connect, "SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
        exit("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }

    // если такого нет, то сохраняем данные
    $result2 = mysqli_query($connect, "INSERT INTO users (login,password,email,Familiya,Imya,Otchestvo) VALUES('$login','$password','$email','$Familiya','$Imya','$Otchestvo')");
    // Проверяем, есть ли ошибки
    if ($result2 == 'TRUE') {
        echo "<script>alert(Спасибо, за регистрацию!)</script>";
        header('Location: //kzhd.ru/index.php');
    } else {
        exit("Ошибка! Вы не зарегистрированы.");
    }
} else {
    exit("Пароли не совпадают.");
}
