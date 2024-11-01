<?php

namespace vBulletin\Search;

use Dotenv\Dotenv;

class Config
{
    /**
     * Загружает переменные окружения из .env файла.
     */
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
    }

    /**
     * Получает настройки подключения к БД.
     *
     * @return array Параметры для подключения.
     */
    public function getDatabaseConfig(): array
    {
        return [
            'dsn' => $_ENV['DB_DSN'] ?? '',
            'username' => $_ENV['DB_USERNAME'] ?? '',
            'password' => $_ENV['DB_PASSWORD'] ?? ''
        ];
    }
}
