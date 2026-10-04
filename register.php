<?php
include "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "Регистрация прошла успешно!";
    } else {
        $message = "Ошибка: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Регистрация</h2>

<form method="post">
    <label>Имя:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Пароль:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Зарегистрироваться</button>
</form>

<p style="color:green;"><?php echo $message; ?></p>

</body>
</html>