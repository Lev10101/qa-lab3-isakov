<?php

require_once __DIR__ . '/StrengthWorkout.php';

/**
 * @file GymWorkout.php
 * @brief Класс тренировки в тренажёрном зале.
 */

/**
 * @brief Специализированная силовая тренировка в тренажёрном зале.
 *
 * Уровень наследования: Workout -> StrengthWorkout -> GymWorkout.
 */
class GymWorkout extends StrengthWorkout
{
    /** @var int Количество упражнений в программе. */
    private int $exerciseCount;

    /**
     * @brief Создаёт тренировку в тренажёрном зале.
     * @param string $title Название тренировки.
     * @param string $level Уровень подготовки.
     * @param int $duration Продолжительность в минутах.
     * @param int $intensity Интенсивность от 1 до 10.
     * @param int $exerciseCount Количество упражнений.
     */
    public function __construct(
        string $title,
        string $level,
        int $duration,
        int $intensity = 7,
        int $exerciseCount = 6
    ) {
        parent::__construct($title, $level, $duration, $intensity);
        $this->exerciseCount = max(1, $exerciseCount);
    }

    /**
     * @brief Возвращает тип тренировки.
     * @return string Тип тренировки.
     */
    public function getType(): string
    {
        return 'Тренировка в зале';
    }

    /**
     * @brief Возвращает количество упражнений.
     * @return int Количество упражнений.
     */
    public function getExerciseCount(): int
    {
        return $this->exerciseCount;
    }

    /**
     * @brief Возвращает рекомендуемое среднее количество подходов.
     * @return int Рекомендуемое количество подходов.
     */
    public function getRecommendedSets(): int
    {
        return $this->getIntensity() >= 8 ? 4 : 3;
    }
}
