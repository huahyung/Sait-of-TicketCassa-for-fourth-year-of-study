<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Справочник "Чеки"</title>
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <?php
    echo "<h4>Справочник - Чеки</h4>";
      echo "<button class='add-btn' onclick=\"openModal()\">Добавить чек</button>";
    echo "<center>";
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Id чека</th>";
    echo "<th>Информация</th>";
    echo "<th>Возврат</th>";
    echo "<th>Номер билета</th>";
    echo "<th></th>";
    echo "<th>
   
    </th>";
    echo "</tr>";
    echo "</thead>";
    include("../database/db.php");
    $r = mysqli_query($connect, "Select * from `tip`");
    $myrow = mysqli_fetch_array($r);

    do {
        echo "<tr>";
        echo "<form action='../database/update/update_tip.php' method='GET' name='form'>";
        echo "<th><input size='1' class='form-control input-sm' name='idTip' type='text' value='$myrow[idTip]' readonly='readonly'/></th>";
        echo "<td><input size='25' class='form-control input-sm' name='Info' type='text' value='$myrow[Info]'/></td>";
        echo "<td><input size='30' class='form-control input-sm' name='ReturnBack' type='text' value='$myrow[ReturnBack]'/></td>";
        echo "<td><input size='20' class='form-control input-sm' name='NumTicket' type='text' value='$myrow[NumTicket]'/></td>";
        echo "<td><input type='submit' class='btn btn-warning' value='Изменить'/></td></form>";
        echo "<td><a href='../database/delete/delete_tips.php?idTip=$myrow[idTip]' class='btn btn-danger'>Удалить</a></td>";
        echo "</tr>";
    } while ($myrow = mysqli_fetch_array($r));
    echo "</table>";
    ?>
    <!-- Модальное окно "Добавление" -->
  <div id="addModal" class="modal">
        <div class="modal-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h5 style="margin: 0;">Добавить чек</h5>
                <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 20px; cursor: pointer;">×</button>
            </div>
                <div class="modal-body">
                    <form method="POST" action="../database/insert/insert_tips.php" role="form" class="form-horizontal">
                       
                        <div class="form-group">
                            <input type="text" name="Info" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Информация</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="ReturnBack" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Информация о возврате</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="NumTicket" class="form-control" id="floatingInput" required="required">
                            <label for="floatingInput">Номер билета</label>
                        </div>
                       

              
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>
                </form>
            </div>
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