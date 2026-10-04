<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "config.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM workouts WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location.href='workouts.php';</script>";
        exit();
    } else {
        echo "Ошибка удаления: " . $conn->error;
    }
}
?>