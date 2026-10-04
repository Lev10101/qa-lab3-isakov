<?php

require_once __DIR__ . '/classes/WorkoutFactory.php';

$workouts = [
    WorkoutFactory::create('gym', 'Силовая на всё тело', 'Средний', 75),
    WorkoutFactory::create('running', 'Лёгкая пробежка', 'Начальный', 40),
    WorkoutFactory::create('cardio', 'Кардио-интервалы', 'Продвинутый', 30),
    WorkoutFactory::create('strength', 'Грудь и плечи', 'Средний', 60),
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>FitLife — ООП-демонстрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>FitLife</h1>
    <nav>
        <a href="index.php">Главная</a>
        <a href="workouts.php">Каталог</a>
        <a href="add_workout.php">Добавить тренировку</a>
        <a href="oop_demo.php">ООП-модуль</a>
    </nav>
</header>

<div class="container">
    <h2>Демонстрация ООП-модуля</h2>
    <p>На странице показано создание объектов специализированных тренировок через фабрику.</p>

    <table>
        <tr>
            <th>Тип</th>
            <th>Название</th>
            <th>Уровень</th>
            <th>Время, мин</th>
            <th>Расчёт, ккал</th>
        </tr>
        <?php foreach ($workouts as $workout): ?>
            <tr>
                <td><?= htmlspecialchars($workout->getType()) ?></td>
                <td><?= htmlspecialchars($workout->getTitle()) ?></td>
                <td><?= htmlspecialchars($workout->getLevel()) ?></td>
                <td><?= $workout->getDuration() ?></td>
                <td><?= number_format($workout->calculateCalories(), 0, ',', ' ') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="info-box">
        <strong>Иерархия классов:</strong>
        Workout → StrengthWorkout → GymWorkout<br>
        Workout → CardioWorkout → RunningWorkout
    </div>
</div>
</body>
</html>
