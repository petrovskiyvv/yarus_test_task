<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Форма добавления</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready (function () {
            $("#done").click (function () {
                $("#messageShow").hide ();
                var equipment = $("#equipment").val ();
                var textarea = $("#textarea").val ();
                var fail = "";
                if (equipment === 'none') {
                    fail = "Модель не выбрана";
                } else if (textarea.length === 0) {
                    fail = "SN не заполнен";
                }
                if (fail !== "") {
                    $('#messageShow').html (fail);
                    $('#messageShow').show ();
                    return false;
                }
                $.ajax ({
                    url: "create.php",
                    type: "POST",
                    data: {'equipment': equipment, 'comment': textarea},
                    dataType: "html",
                    success: function (data) {
                        $('#messageShow').html(data);
                        $('#messageShow').show();
                    }
                })
            });
        });
    </script>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
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
            echo "<select class='form-select' name = 'equipment' id = 'equipment' required>";
            echo "<option value='none' selected hidden>Выберете модель</option>";
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
        <div id="messageShow"></div>
        <br>
        <div class="row gy-3">
            <div class="d-grid gap-2 justify-content-md-end-auto">
                <button class="w-100 btn btn-lg btn-primary" id="done" name="done" type="button">Отправить</button>
            </div>
            <div class="d-grid gap-2 justify-content-md-end-auto">
                <button class="w-100 btn btn-lg btn-primary" formaction="/table.php" type="submit">Перейти к таблице</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>