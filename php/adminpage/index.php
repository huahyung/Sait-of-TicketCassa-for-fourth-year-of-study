<?php
session_start();
include("../database/db.php");
?>
<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>

   

  
        
                       
                        
        <div class="modal" id="aut" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Вход в личный кабинет</h5>
                    
                    </div>
                    <div class="modal-body">
                        <form method="POST" action=" /php/authorization/sign.php" role="form" class="form-horizontal">
                            <div class="form-group">
                                <input type="text" name="Login" class="form-control" id="floatingInput" required="required">
                                <label for="floatingInput">Логин</label>
                            </div>
                            <div class="form-group">
                                <input type="password" name="Password" class="form-control" id="floatingPassword" required="required">
                                <label for="floatingPassword">Пароль</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                       
                        <button type="submit" class="btn-btn-primary">Войти</button>
                         <button type="button" id='regist' class="btn-btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2">Зарегистрироваться</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal2" id="reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
                        
                    </div>
                    <div>
                        <form method="POST" action="../php/registration/registration.php" role="form" class="form-horizontal">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="floatingInput" required="required">
                                <label for="floatingInput">E-mail</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Familiya" class="form-control" id="floatingInput" required="required">
                                <label for="floatingInput">Фамилия</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Imya" class="form-control" id="floatingInput1" required="required">
                                <label for="floatingInput1">Имя</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="Otchestvo" class="form-control" id="floatingInput">
                                <label for="floatingInput">Отчество(если есть)</label>
                            </div>
                            <div class="form-group">
                                <input type="text" name="login" class="form-control" id="floatingInput" required="required">
                                <label for="floatingInput">Логин</label>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="floatingPassword" required="required">
                                <label for="floatingPassword">Пароль</label>
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_password" class="form-control" id="floatingPassword" required="required">
                                <label for="floatingPassword">Подтвердить пароль</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                       
                        <button type="submit" class="btn-btn-primary">Зарегистрироваться</button>
                         <button type="button" id='auth' class="btn-btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Войти</button>
                        </form>
                    </div>
                </div>
            </div>
      <script>
        const regModal = document.getElementById('reg');  // модальное окно регистрации
        const autModal = document.getElementById('aut');  // модальное окно авторизации
        const registBtn = document.getElementById('regist'); // кнопка Регистрация
        const authBtn = document.getElementById('auth') //кнопка вход
       
        function openRegModal() {
            regModal.style.display = 'block';
            autModal.style.display = 'none';
        }
        
   

        function openAutModal() {
            autModal.style.display = 'block';
            regModal.style.display = 'none';
        }
        
       
       
     
        
        // Добавляем обработчики событий
        if (registBtn) {
            registBtn.addEventListener('click', openRegModal);
        }
        if (authBtn) {
            authBtn.addEventListener('click', openAutModal);
        }
        
       
    </script>       
</body>

</html>