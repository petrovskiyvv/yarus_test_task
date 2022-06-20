<!DOCTYPE html>
<html>
<head>
  <title>Оборудование</title>
  <meta charset="utf-8" />
</head>
<body>
<h3>Форма ввода данных</h3>
<form action="create.php" method="POST">
  <select name="equipment" size="1">
    <option value="TP-Link TL-WR74">TP-Link TL-WR74</option>
    <option value="D-Link DIR-300">D-Link DIR-300</option>
    <option value="D-Link DIR-300 S">D-Link DIR-300 S</option>
  </select><br>
  <p>Краткий комментарий (материться можно): <br>
    <textarea name="comment" maxlength="200"></textarea></p>
  <input type="submit" value="Отправить">

</form>

<?php
$conn = new mysqli("localhost", "root", "Ghjvfd!2", "equipment");
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