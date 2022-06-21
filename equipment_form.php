<!DOCTYPE html>
<html>
<head>
  <title>Оборудование</title>
  <meta charset="utf-8" />
</head>
<body>
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
if($conn->connect_error){
  die("Ошибка: " . $conn->connect_error);
}
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