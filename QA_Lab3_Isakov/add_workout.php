<?php
include "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $level = $_POST["level"];
    $duration = $_POST["duration"];

    $sql = "INSERT INTO workouts (title, level, duration)
            VALUES ('$title', '$level', '$duration')";

    if ($conn->query($sql) === TRUE) {
        $message = "Тренировка успешно добавлена!";
    } else {
        $message = "Ошибка: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить тренировку</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Добавление тренировки</h2>

<form method="post">
    <label>Название:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Уровень:</label><br>
    <input type="text" name="level" required><br><br>

    <label>Длительность:</label><br>
    <input type="text" name="duration" required><br><br>

    <button type="submit">Добавить</button>
</form>

<p style="color:green;"><?php echo $message; ?></p>

<br>
<a href="workouts.php">Перейти к каталогу</a>

<script>
document.querySelector("form").addEventListener("submit", function(e) {
    let title = document.querySelector("input[name='title']").value;
    
    if (title.length < 3) {
        alert("Название должно быть не менее 3 символов!");
        e.preventDefault();
    }
});
</script>

</body>
</html>