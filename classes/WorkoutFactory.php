<?php

require_once __DIR__ . '/Workout.php';
require_once __DIR__ . '/StrengthWorkout.php';
require_once __DIR__ . '/GymWorkout.php';
require_once __DIR__ . '/CardioWorkout.php';
require_once __DIR__ . '/RunningWorkout.php';

/**
 * @file WorkoutFactory.php
 * @brief Фабрика демонстрационных тренировок FitLife.
 */

/**
 * @brief Создаёт объекты тренировок по строковому типу.
 */
class WorkoutFactory
{
    /**
     * @brief Создаёт тренировку заданного типа.
     * @param string $type Тип тренировки: gym, strength, running или cardio.
     * @return Workout Созданный объект тренировки.
     * @throws InvalidArgumentException Если передан неизвестный тип.
     */
    public static function create(
        string $type,
        string $title,
        string $level,
        int $duration
    ): Workout {
        return match (strtolower($type)) {
            'gym' => new GymWorkout($title, $level, $duration, 7, 6),
            'strength' => new StrengthWorkout($title, $level, $duration, 6),
            'running' => new RunningWorkout($title, $level, $duration, 145, 6.0),
            'cardio' => new CardioWorkout($title, $level, $duration, 135),
            default => throw new InvalidArgumentException('Неизвестный тип тренировки: ' . $type),
        };
    }
}
