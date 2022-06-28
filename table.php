<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Список оборудования</title>
    <base href="test_task_Yarus/"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href='CSS/style.css'>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <button class="w-100 btn btn-lg btn-primary" onclick="history.back();" type="submit">Вернуться к форме</button>
    <?php
    include __DIR__ . '/DB/core.php';
    $ini = parse_ini_file(__DIR__ . '/vendor/settings.ini');
    $conn = connect_table($ini['db_name']);
    $sql = "SELECT * FROM equipment_list";
    if($result = $conn->query($sql)) {
        echo "<table class='table table-striped'><tr><th scope='col'>ID</th><th scope='col'>Модель</th><th scope='col'>Серийный номер</th></tr>";
        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["serial_num"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        $result->free();
    }
    ?>
</body>
</html>
