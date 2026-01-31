<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Справочник "Типы билетов"</title>
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <?php
    
    echo "<h4>Справочник - Типы билетов</h4>";
    
    echo "<button class='add-btn' onclick=\"openModal()\">Добавить тип билета</button>";
    echo "<center>";
    echo "<table class='table table-hover'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Тип</th>";
    echo "<th>Цена</th>";
    echo "<th>Количество</th>";
    
    echo "<th></th>";
    echo "<th>
  
    </th>";
    echo "</tr>";
    echo "</thead>";
    include("../database/db.php");
    $r = mysqli_query($connect, "Select * from `typeoftic`");
    $myrow = mysqli_fetch_array($r);

    do {
        echo "<tr>";
        echo "<form action='../database/update/update_typeoftic.php' method='GET' name='form'>";
        echo "<th><input size='1' class='form-control input-sm' name='idTypeOfTic' type='text' value='$myrow[idTypeOfTic]' readonly='readonly'/></th>";
        echo "<td><input size='15' class='form-control input-sm' name='Type' type='text' value='$myrow[Type]'/></td>";
        echo "<td><input size='15' class='form-control input-sm' name='Cost' type='text' value='$myrow[Cost]'/></td>";
        echo "<td><input size='15' class='form-control input-sm' name='Quantity' type='text' value='$myrow[Quantity]'/></td>";
        echo "<td><input type='submit' class='btn btn-warning' value='Изменить'/></td></form>";
        echo "<td><a href='../database/delete/delete_typeoftic.php?idTypeOfTic=$myrow[idTypeOfTic]' class='btn btn-danger'>Удалить</a></td>";
        echo "</tr>";
    } while ($myrow = mysqli_fetch_array($r));
    echo "</table>";
    ?>
    <!-- Модальное окно "Добавление" -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h5 style="margin: 0;">Добавить тип билета</h5>
                <button type="button" onclick="closeModal()" style="background: none; border: none; font-size: 20px; cursor: pointer;">×</button>
            </div>
                
            <form method="POST" action="../database/insert/insert_typeoftic.php" role="form">
                <div class="form-group mb-3">
                    <input type="text" name="Type"  id="floatingInput" required="required">
                    <label for="floatingInput">Тип</label>
                </div>
                <div class="form-group mb-3">
                    <input type="text" name="Cost" id="floatingInput" required="required">
                    <label for="floatingInput">Цена</label>
                </div>
                      
                <div class="form-group">
                    <input type="text" name="Quantity"  id="floatingInput" required="required">
                    <label for="floatingInput">Количество</label>
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