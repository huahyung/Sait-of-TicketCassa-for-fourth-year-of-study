<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Справочник "Билеты"</title>
    
        <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <?php
    echo "<h4>Справочник - Билеты</h4>";
    echo "<button class='add-btn' onclick=\"openModal()\">Добавить билеты</button>";
    echo "<center>";
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Номер билета</th>";
    echo "<th>Детали билета</th>";
    echo "<th>Id концерта</th>";
    echo "<th>Id типа билета</th>";
    echo "<th>Сотрудник который оформлял</th>";
    echo "<th></th>";
    echo "<th>
   
    </th>";
    echo "</tr>";
    echo "</thead>";
    include("../database/db.php");
    $r = mysqli_query($connect, "Select * from `ticket`");
    $myrow = mysqli_fetch_array($r);

    do {
        echo "<tr>";
        echo "<form action='../database/update/update_ticket.php' method='GET' name='form'>";
        echo "<th><input size='1' class='form-control input-sm' name='NumTicket' type='text' value='$myrow[NumTicket]' readonly='readonly'/></th>";
        echo "<td><input size='15' class='form-control input-sm' name='DetailsOfTic' type='text' value='$myrow[DetailsOfTic]'/></td>";
        echo "<td><input class='form-control input-sm' name='Consert_idConsert' type='text' value='$myrow[Consert_idConsert]'/></td>";
        echo "<td><input size='20' class='form-control input-sm' name='idTypeOfTic' type='text' value='$myrow[idTypeOfTic]'/></td>";
        echo "<td><input size='30' class='form-control input-sm' name='id_Sotrudniki' type='text' value='$myrow[id_Sotrudniki]'/></td>";
        echo "<td><input type='submit' class='btn btn-warning' value='Изменить'/></td></form>";
        echo "<td><a href='../database/delete/delete_ticket.php?NumTicket=$myrow[NumTicket]' class='btn btn-danger' >Удалить</a></td>";
        echo "</tr>";
    } while ($myrow = mysqli_fetch_array($r));
    echo "</table>";
    ?>
    <!-- Модальное окно "Добавление" -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h5 style="margin: 0;">Добавить билет</h5>
                <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 20px; cursor: pointer;">×</button>
            </div>
                    <form method="POST" action="../database/insert/insert_ticket.php" role="form" class="form-horizontal">

                        <div class="form-group">
                            <input type="text" name="DetailsOfTic" id="floatingInput" required="required">
                            <label for="floatingInput">Детали билета</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="Consert_idConsert"  id="floatingInput" required="required">
                            <label for="floatingInput">Id концерта</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="idTypeOfTic"  id="floatingInput" required="required">
                            <label for="floatingInput">Id тип билета</label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="id_Sotrudniki"  id="floatingInput" required="required">
                            <label for="floatingInput">Id сотрудника который заполнял</label>
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