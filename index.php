<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Оборудование</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <div class="col-md" style="background-color: lavenderblush">
        <figure class="text-center">
            <p class="h3">Пожалуй, лучшая форма для ввода данных в мире, да что там в мире - в России!</p>
        </figure>
        <label for="equipment" class="form-label">Модель оборудования: </label>
        <form action="create.php" method="POST">
            <?php
            include "DB\core.php";
            $conn = connect_table("equipment");
            $sql = "SELECT id, name FROM equipment_template";
            if($result = $conn->query($sql)) {
                echo "<select class='form-select' name = 'equipment'>";
                echo "<option disabled>Выберите оборудование</option>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value ='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
                echo "</select>";
            }
            ?>
            <label for="comment" class="form-label">Серийный номер оборудования: </label>
            <label>
                <textarea name="comment" class="form-control"></textarea>
            </label>
            <div id="commentHelpBlock" class="form-text">
                При одновременном вводе нескольких номеров, необходимо их разделять переносом строки.
            </div>
            <div class="d-grid gap-2 justify-content-md-end-auto">
                <button class="btn btn-secondary" type="submit">Отправить</button>
            </div>

        </form>

        <?php
        $sql = "SELECT * FROM equipment_list";
        if($result = $conn->query($sql)){
            $rowsCount = $result->num_rows; // количество полученных строк
            echo "<p>Получено объектов: $rowsCount</p>";
            echo "<table class='table table-striped table-hover'><tr><th scope='col'>Id</th><th scope='col'>Модель</th><th scope='col'>Серийный номер</th></tr>";
            foreach($result as $row){
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["serial_num"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            $result->free();
        } else{
            echo "Ошибка: " . $conn->error;
        }
        $conn->close();
        ?>
        </div>
    </body>
</html>