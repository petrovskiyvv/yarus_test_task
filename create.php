<?php
include "DB\core.php";
if(isset($_POST["equipment"]) && isset($_POST["comment"]))
{
    $conn = connect_table("equipment");
    $equipment = $conn->real_escape_string($_POST["equipment"]);
    $comment = $conn->real_escape_string($_POST["comment"]);
    $sql = "SELECT mask FROM equipment_template WHERE name = '$equipment'";
    if($mask = $conn->query($sql)) {
        foreach ($mask as $m) {
            if (preg_match($m["mask"], $comment)) {
                $sql = "INSERT INTO equipment_list (name, serial_num) VALUES ('$equipment', '$comment')";
                if($conn->query($sql)){
                    header("Location: equipment_form.php");
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
}
?>