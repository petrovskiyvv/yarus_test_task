<?php
include __DIR__ . '/DB/core.php';
if(isset($_POST["equipment"]) && isset($_POST["comment"]))
{
    $ini = parse_ini_file(__DIR__ . '/DB/settings.ini');

    $conn = connect_db($ini['db_name']);
    $equipment = $conn->real_escape_string($_POST["equipment"]);
    $id = $conn->real_escape_string($_POST["comment"]);
    $arr_id = explode("\\n", $id);
    $flag_sent = 0;
    $flag_duplicate = 0;
    $bad_id = array();
    $sql = "SELECT mask, name FROM equipment_template WHERE id = '$equipment'";
    if($result = $conn->query($sql)) {
        $row = mysqli_fetch_array($result);
        foreach($arr_id as $uniq_id) {
            if (preg_match($row["mask"], $uniq_id)) {
                $sql = "INSERT INTO equipment_list (name, serial_num) VALUES ('$row[name]', '$uniq_id')";
                try  {
                    $conn->query($sql);
                    $flag_sent = 1;
                    echo "Успешно отправленно: " . $uniq_id . "<br>";
                }
                catch (Throwable $ex) {
                    $flag_duplicate = 1;
                    echo "Уже имеется в базе: " . $uniq_id . "<br>";
                }
            }
            else {
                echo "Не соотвествует маске оборудования: " . $uniq_id . "<br>";
            }
        }
    }
    $conn->close();
}
?>