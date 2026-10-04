<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>FitLife - Главная</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>FitLife</h1>
    <nav>
        <a href="register.php">Регистрация</a>
        <a href="workouts.php">Каталог</a>
        <a href="add_workout.php">Добавить тренировку</a>
        <a href="oop_demo.php">ООП-модуль</a>
    </nav>
</header>

<div class="container">
    <h2>Добро пожаловать на FitLife!</h2>
    <p>FitLife — это платформа для организации фитнес-тренировок. 
       Здесь вы можете просматривать каталог тренировок, 
       регистрироваться в системе и добавлять новые программы.</p>
    <br>
    <a href="workouts.php"><button>Перейти к каталогу</button></a>
</div>

</body>
</html>