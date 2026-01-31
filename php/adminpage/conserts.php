<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Справочник "Концерты"</title>
    
</head>

<body>
    <?php
    echo "<h4>Справочник - Концерты</h4>";
    
    // Кнопка добавления
    echo "<button class='add-btn' onclick=\"openModal()\">Добавить концерт</button>";
    
    echo "<center>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Артист</th>";
    echo "<th>Дата</th>";
    echo "<th>Время начала</th>";
    echo "<th>Адрес</th>";
    echo "<th>Место</th>";
    echo "<th>Тип</th>";
    echo "<th></th>";
    echo "<th></th>";
    echo "</tr>";
    echo "</thead>";
    
    include("../database/db.php");
    $r = mysqli_query($connect, "Select * from `consert`");
    $myrow = mysqli_fetch_array($r);

    do {
        echo "<tr>";
        echo "<form action='../database/update/update_concert.php' method='GET' name='form'>";
        echo "<th><input size='1' name='idConsert' type='text' value='$myrow[idConsert]' readonly='readonly'/></th>";
        echo "<td><input size='15' name='Artist' type='text' value='$myrow[Artist]'/></td>";
        echo "<td><input name='Data' type='date' value='$myrow[Data]'/></td>";
        echo "<td><input size='20' name='Time' type='time' value='$myrow[Time]'/></td>";
        echo "<td><input size='30' name='Adress' type='text' value='$myrow[Adress]'/></td>";
        echo "<td><input size='15' name='Place' type='text' value='$myrow[Place]'/></td>";
        echo "<td><input size='15' name='Type' type='text' value='$myrow[Type]'/></td>";
        echo "<td><input type='submit' class='btn btn-warning' value='Изменить'/></td>";
        echo "</form>";
        echo "<td><a href='../database/delete/delete_conserts.php?idConsert=$myrow[idConsert]' class='delete-link'>Удалить</a></td>";
        echo "</tr>";
    } while ($myrow = mysqli_fetch_array($r));
    
    echo "</table>";
    echo "</center>";
    ?>

    <!-- Модальное окно "Добавление" -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h5 style="margin: 0;">Добавить концерт</h5>
                <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 20px; cursor: pointer;">×</button>
            </div>
            <form method="POST" action="../database/insert/insert_concert.php" role="form">
                <div class="form-group">
                    <label>Дата</label>
                    <input type="date" name="Data" required>
                </div>
                <div class="form-group">
                    <label>Время начала</label>
                    <input type="time" name="Time" required>
                </div>
                <div class="form-group">
                    <label>Артист</label>
                    <input type="text" name="Artist" required>
                </div>
                <div class="form-group">
                    <label>Адрес</label>
                    <input type="text" name="Adress" required>
                </div>
                <div class="form-group">
                    <label>Тип концерта</label>
                    <input type="text" name="Type" required>
                </div>
                <div class="form-group">
                    <label>Место</label>
                    <input type="text" name="Place" required>
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