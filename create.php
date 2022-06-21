<?php
include "DB\core.php";
if(isset($_POST["equipment"]) && isset($_POST["comment"]))
{
    $conn = connect_table("equipment");
    $equipment = $conn->real_escape_string($_POST["equipment"]);
    $comment = $conn->real_escape_string($_POST["comment"]);
    $sql = "SELECT mask, name FROM equipment_template WHERE id = '$equipment'";
    if($result = $conn->query($sql)) {
        $row = mysqli_fetch_array($result);
        if (preg_match($row["mask"], $comment)) {
            $sql = "INSERT INTO equipment_list (name, serial_num) VALUES ('$row[name]', '$comment')";
            if($conn->query($sql)){
                header("Location: index.php");
            }
            else {
                echo "Ошибка: " . $conn->error;
            }
        }
        else {
            echo "Ошибка: введенное значение SN не соотвествует устройству";
        }
    }
}


$conn->close();

?>