<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Справочник "Cотрудники"</title>
 
         <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <?php
    echo "<h4>Справочник - Сотрудники</h4>";
    echo "<button class='add-btn' onclick=\"openModal()\">Добавить сотрудника</button>";
    echo "<center>";
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Фамилия</th>";
    echo "<th>Имя</th>";
    echo "<th>Отчество</th>";
    echo "<th>Логин</th>";
    echo "<th>Пароль</th>";
    echo "<th>Должность</th>";
    echo "<th>Роль</th>";
    echo "<th></th>";
    echo "<th>
   
    </th>";
    echo "</tr>";
    echo "</thead>";
    include("../database/db.php");
    $r = mysqli_query($connect, "Select * from `sotrudniki`");
    $myrow = mysqli_fetch_array($r);

    do {
        echo "<tr>";
        echo "<form action='../database/update/update_sotrudniki.php' method='GET' name='form'>";
        echo "<th><input size='1' class='form-control input-sm' name='id_Sotrudniki' type='text' value='$myrow[id_Sotrudniki]' readonly='readonly'/></th>";
        echo "<td><input size='15' class='form-control input-sm' name='Familia' type='text' value='$myrow[Familia]'/></td>";
        echo "<td><input class='form-control input-sm' name='Name' type='text' value='$myrow[Name]'/></td>";
        echo "<td><input size='20' class='form-control input-sm' name='Otchestvo' type='text' value='$myrow[Otchestvo]'/></td>";
        echo "<td><input size='30' class='form-control input-sm' name='Login' type='text' value='$myrow[Login]'/></td>";
        echo "<td><input size='15' class='form-control input-sm' name='Password' type='text' value='$myrow[Password]'/></td>";
        echo "<td><input size='15' class='form-control input-sm' name='idDoljnost' type='text' value='$myrow[idDoljnost]'/></td>";
        echo "<td><input type='submit' class='btn btn-warning' value='Изменить'/></td></form>";
        echo "<td><a href='../database/delete/delete_sotrudniki.php?id_Sotrudniki=$myrow[id_Sotrudniki]' class='btn btn-danger'>Удалить</a></td>";
        echo "</tr>";
    } while ($myrow = mysqli_fetch_array($r));
    echo "</table>";
    ?>
    <!-- Модальное окно "Добавление" -->
  <div id="addModal" class="modal">
        <div class="modal-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h5 style="margin: 0;">Добавить сотрудника</h5>
                <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 20px; cursor: pointer;">×</button>
            </div>
                    <form method="POST" action="../database/insert/insert_sotrudniki.php" role="form" class="form-horizontal">
                        <div class="form-group">
                            <input type="text" name="Familia" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Фамилия</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Name" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Имя</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="Otchestvo" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Отчество</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Login" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Логин</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Password" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Пароль</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="idDoljnost" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Должность</label>
                        </div>
                       

                    
                <div class="modal-buttons">
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Закрыть</button>
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
            </form>
        </div>
    </div>


      <script>
        function openModal() {
            document.getElementById('addModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('addModal').style.display = 'none';
        }

        // Закрытие модального окна при клике вне его
        window.onclick = function(event) {
            var modal = document.getElementById('addModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>

</html>