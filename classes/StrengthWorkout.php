<?php

require_once __DIR__ . '/Workout.php';

/**
 * @file StrengthWorkout.php
 * @brief Класс силовых тренировок.
 */

/**
 * @brief Представляет силовую тренировку.
 *
 * Расширяет базовую тренировку параметром интенсивности.
 */
class StrengthWorkout extends Workout
{
    /** @var int Интенсивность силовой тренировки от 1 до 10. */
    protected int $intensity;

    /**
     * @brief Создаёт силовую тренировку.
     * @param string $title Название тренировки.
     * @param string $level Уровень подготовки.
     * @param int $duration Продолжительность в минутах.
     * @param int $intensity Интенсивность от 1 до 10.
     */
    public function __construct(
        string $title,
        string $level,
        int $duration,
        int $intensity = 6
    ) {
        parent::__construct($title, $level, $duration);
        $this->intensity = max(1, min(10, $intensity));
    }

    /**
     * @brief Возвращает тип тренировки.
     * @return string Тип силовой тренировки.
     */
    public function getType(): string
    {
        return 'Силовая тренировка';
    }

    /**
     * @brief Возвращает интенсивность тренировки.
     * @return int Интенсивность от 1 до 10.
     */
    public function getIntensity(): int
    {
        return $this->intensity;
    }

    /**
     * @brief Рассчитывает расход калорий для силовой тренировки.
     *
     * Используется упрощённая модель: расход зависит от длительности
     * и интенсивности нагрузки.
     *
     * @return float Оценочный расход калорий.
     */
    public function calculateCalories(): float
    {
        $caloriesPerMinute = 5.0 + ($this->intensity * 1.2);
        return $this->duration * $caloriesPerMinute;
    }
}
