CREATE DATABASE IF NOT EXISTS fitlife_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE fitlife_db;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_users_email (email)
);

CREATE TABLE IF NOT EXISTS workouts (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(150) NOT NULL,
    level VARCHAR(50) NOT NULL,
    duration INT UNSIGNED NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO workouts (title, level, duration) VALUES
('Силовая тренировка: всё тело', 'Средний', 75),
('Лёгкая кардиотренировка', 'Начальный', 40),
('Интервальная тренировка', 'Продвинутый', 30);
