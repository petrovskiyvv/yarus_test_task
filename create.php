<?php
include "DB\core.php";
if(isset($_POST["equipment"]) && isset($_POST["comment"]))
{
    $conn = connect_table("equipment");
    $equipment = $conn->real_escape_string($_POST["equipment"]);
    echo "$equipment<br>";
    $comment = $conn->real_escape_string($_POST["comment"]);
    echo "$comment";
    $sql = "INSERT INTO equipment_list (name, serial_num) VALUES ('$equipment', '$comment')";
    if($conn->query($sql)){
        header("Location: equipment_form.php");
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
}
?>