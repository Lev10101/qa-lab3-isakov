<?php

/**
 * @file Workout.php
 * @brief Базовый класс тренировочной программы FitLife.
 */

/**
 * @brief Абстрактное представление фитнес-тренировки.
 *
 * Класс хранит общие характеристики тренировки и определяет
 * интерфейс для специализированных типов тренировок.
 */
abstract class Workout
{
    /** @var string Название тренировки. */
    protected string $title;

    /** @var string Уровень подготовки пользователя. */
    protected string $level;

    /** @var int Продолжительность тренировки в минутах. */
    protected int $duration;

    /**
     * @brief Создаёт тренировочную программу.
     * @param string $title Название тренировки.
     * @param string $level Уровень подготовки.
     * @param int $duration Продолжительность в минутах.
     */
    public function __construct(string $title, string $level, int $duration)
    {
        $this->title = $title;
        $this->level = $level;
        $this->duration = max(1, $duration);
    }

    /**
     * @brief Возвращает название тренировки.
     * @return string Название тренировки.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @brief Возвращает уровень подготовки.
     * @return string Уровень подготовки.
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * @brief Возвращает длительность тренировки.
     * @return int Длительность в минутах.
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @brief Возвращает название конкретного типа тренировки.
     * @return string Тип тренировки.
     */
    abstract public function getType(): string;

    /**
     * @brief Рассчитывает ориентировочный расход калорий.
     * @return float Количество килокалорий.
     */
    abstract public function calculateCalories(): float;

    /**
     * @brief Формирует краткое текстовое описание тренировки.
     * @return string Строка с основными характеристиками.
     */
    public function getSummary(): string
    {
        return sprintf(
            '%s: %s, уровень %s, %d мин, ~%.0f ккал',
            $this->getType(),
            $this->title,
            $this->level,
            $this->duration,
            $this->calculateCalories()
        );
    }
}
