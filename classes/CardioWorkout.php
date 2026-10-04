<?php

require_once __DIR__ . '/Workout.php';

/**
 * @file CardioWorkout.php
 * @brief Класс кардиотренировок.
 */

/**
 * @brief Представляет кардиотренировку.
 */
class CardioWorkout extends Workout
{
    /** @var float Средняя частота пульса во время нагрузки. */
    protected float $averageHeartRate;

    /**
     * @brief Создаёт кардиотренировку.
     * @param string $title Название тренировки.
     * @param string $level Уровень подготовки.
     * @param int $duration Продолжительность в минутах.
     * @param float $averageHeartRate Средняя частота пульса.
     */
    public function __construct(
        string $title,
        string $level,
        int $duration,
        float $averageHeartRate = 135.0
    ) {
        parent::__construct($title, $level, $duration);
        $this->averageHeartRate = max(60.0, $averageHeartRate);
    }

    /**
     * @brief Возвращает тип тренировки.
     * @return string Тип кардиотренировки.
     */
    public function getType(): string
    {
        return 'Кардиотренировка';
    }

    /**
     * @brief Возвращает среднюю частоту пульса.
     * @return float Средняя частота пульса в ударах в минуту.
     */
    public function getAverageHeartRate(): float
    {
        return $this->averageHeartRate;
    }

    /**
     * @brief Рассчитывает ориентировочный расход калорий.
     * @return float Оценочный расход калорий.
     */
    public function calculateCalories(): float
    {
        $caloriesPerMinute = 4.0 + max(0.0, ($this->averageHeartRate - 100.0) / 30.0);
        return $this->duration * $caloriesPerMinute;
    }
}
