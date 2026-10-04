<?php

require_once __DIR__ . '/CardioWorkout.php';

/**
 * @file RunningWorkout.php
 * @brief Класс беговой тренировки.
 */

/**
 * @brief Специализированная кардиотренировка для бега.
 *
 * Уровень наследования: Workout -> CardioWorkout -> RunningWorkout.
 */
class RunningWorkout extends CardioWorkout
{
    /** @var float Средний темп бега в минутах на километр. */
    private float $pace;

    /**
     * @brief Создаёт беговую тренировку.
     * @param string $title Название тренировки.
     * @param string $level Уровень подготовки.
     * @param int $duration Продолжительность в минутах.
     * @param float $averageHeartRate Средняя частота пульса.
     * @param float $pace Средний темп в минутах на километр.
     */
    public function __construct(
        string $title,
        string $level,
        int $duration,
        float $averageHeartRate = 145.0,
        float $pace = 6.0
    ) {
        parent::__construct($title, $level, $duration, $averageHeartRate);
        $this->pace = max(2.5, $pace);
    }

    /**
     * @brief Возвращает тип тренировки.
     * @return string Тип беговой тренировки.
     */
    public function getType(): string
    {
        return 'Беговая тренировка';
    }

    /**
     * @brief Возвращает средний темп.
     * @return float Средний темп в минутах на километр.
     */
    public function getPace(): float
    {
        return $this->pace;
    }

    /**
     * @brief Рассчитывает ориентировочную дистанцию.
     * @return float Расстояние в километрах.
     *
     * Формула: расстояние = длительность / темп.
     */
    public function calculateDistance(): float
    {
        return $this->duration / $this->pace;
    }
}
