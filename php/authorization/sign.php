<?php
session_start();

if (isset($_POST['Login'])) {
    $Login = $_POST['Login'];
    if ($Login == '') {
        unset($Login);
    }
} //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['Password'])) {
    $Password = $_POST['Password'];
    if ($Password == '') {
        unset($Password);
    }
} //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($Login) or empty($Password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
    // exit("");
    echo "<script>alert('Вы ввели не всю информацию, вернитесь назад и заполните все поля!')</script>";
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$Login = stripslashes($Login);
$Login = htmlspecialchars($Login);

$Password = stripslashes($Password);
$Password = htmlspecialchars($Password);

//удаляем лишние пробелы
$Login = trim($Login);
$Password = trim($Password);


// подключаемся к базе
include("../database/db.php"); // файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 


$result = mysqli_query($connect, "SELECT login, cast(aes_decrypt(`password`,'mysecretkey')as char) as decrypted_password, Familia, id_Sotrudniki FROM sotrudniki WHERE Login='$Login'");

if ($myrow = mysqli_fetch_array($result)) {
    if (empty($myrow['decrypted_password'])) {
        echo "<script>alert('Извините, введённый вами логин или пароль неверный.')</script>";
    }

    if ($myrow['decrypted_password'] == $Password) {
        $_SESSION['Login'] = $myrow['Login'];
        $_SESSION['Familia'] = $myrow['Familia'];
        $_SESSION['id_Sotrudniki'] = $myrow['id_Sotrudniki'];
        header('Location: ../adminpage/index_admin.php');
        exit();
    } else {
        echo "<script>alert('Извините, введённый вами логин или пароль неверный.')</script>";
    }
} else {
    // Если пользователь не найден
    echo "<script>alert('Извините, введённый вами логин или пароль неверный.')</script>";
}
 /*else {
    $query = mysqli_fetch_array($r);
    if (empty($query['Password'])) {
        //если пользователя с введенным логином не существует
        // exit("");
        echo "<script>alert('Извините, введённый вами логин или пароль неверный.')</script>";
    } else {
        //если существует, то сверяем пароли


        if ($query['Password'] == $Password) {
            //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
            $_SESSION['Login'] = $query['Login'];
            $_SESSION['Familia'] = $query['Familia'];
            $_SESSION['id_Sotrudniki'] = $query['id_Sotrudniki']; //эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
            header('Location: //sait/index.php');
        } else {
            //если пароли не сошлись
            // exit("");
            echo "<script>alert('Извините, введённый вами логин или пароль неверный.')</script>";
        }
    }
}*/
