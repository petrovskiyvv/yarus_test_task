<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Форма добавления</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body class="text-center vsc-initialized">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <div class="col-md" style="background-color: whitesmoke">
        <div class="container">
        <figure class="text-center">
            <p class="h3">Пожалуй, лучшая форма для ввода данных в мире, да что там в мире - в России!</p>
        </figure>
        <br>
        <div class="col-12">
            <label for="equipment" class="form-label">Модель оборудования: </label>
        </div>
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
            <br>
            <div class="mb-2">
                <label for="comment" class="form-label">Серийный номер оборудования: </label>
                <textarea name="comment" class="form-control" rows="2"></textarea>
            </div>
            <div id="commentHelpBlock" class="form-text">
                При одновременном вводе нескольких номеров, необходимо их разделять переносом строки.
            </div>
            <br>
            <div class="d-grid gap-2 justify-content-md-end-auto">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить</button>
            </div>
        </form>
        </div>
        </div>
    </body>
</html>