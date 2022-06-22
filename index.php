<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Форма добавления</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body class="text-center vsc-initialized">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
        <div class="col-md" style="background-color: whitesmoke">
        <div class="container">
        <figure class="text-center">
            <p class="h3">Пожалуй, лучшая форма для ввода данных в мире, да что там в мире - в России!</p>
        </figure>
        <br>
        <form action="create.php" method="POST">
            <?php
            include "DB\core.php";
            $conn = connect_table("equipment");
            $sql = "SELECT id, name FROM equipment_template";
            if($result = $conn->query($sql)) {
                echo "<select class='form-select' name = 'equipment'>";
                echo "<option value='none' selected disabled hidden>Выберете модель</option>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value ='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
                echo "</select>";
            }
            ?>
            <br>
            <div class="mb-2">
                <textarea id='textarea' name="comment" class="form-control" placeholder="Введите SN оборудования" rows="1"></textarea>
                <script>
                    autosize(document.querySelectorAll('textarea'));
                </script>
            </div>
            <div id="commentHelpBlock" class="form-text">
                При одновременном вводе нескольких номеров, необходимо их разделять переносом строки.
            </div>
            <br>
            <div class="row gy-3">
                <div class="d-grid gap-2 justify-content-md-end-auto">
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Отправить</button>
                </div>
                <div class="d-grid gap-2 justify-content-md-end-auto">
                    <button class="w-100 btn btn-lg btn-primary" formaction="/table.php" type="submit">Перейти к таблице</button>
                </div>
            </div>
        </form>
        </div>
        </div>
    </body>
</html>