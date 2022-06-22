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
        <h3>Форма ввода данных</h3>
        <form action="create.php" method="POST">
            <?php
            include "DB\core.php";
            $conn = connect_table("equipment");
            $sql = "SELECT id, name FROM equipment_template";
            if($result = $conn->query($sql)) {
                echo "<select name = 'equipment' size='1''>";
                echo "<option disabled>Выберите оборудование</option>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<option value ='" . $row["id"] . "'>" . $row["name"] . "</option>";
                }
                echo "</select>";
            }
            ?>
            <p>Серийный номер оборудования: <br>
                <label>
                    <textarea name="comment" maxlength="254"></textarea>
                </label></p>
            <input type="submit" value="Отправить">

        </form>

        <?php
        $sql = "SELECT * FROM equipment_list";
        if($result = $conn->query($sql)){
            $rowsCount = $result->num_rows; // количество полученных строк
            echo "<p>Получено объектов: $rowsCount</p>";
            echo "<table><tr><th>Id</th><th>Название</th><th>Серийный номер</th></tr>";
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
    </body>
</html>