<?php

namespace vBulletin\Search;

use PDO;

class DatabaseConnection
{
    private PDO $connection;

    /**
     * @param array $config Конфигурация базы данных (DSN, имя пользователя, пароль).
     */
    public function __construct(array $config)
    {
        $this->connection = new PDO(
            $config['dsn'],
            $config['username'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    /**
     * Возвращает подключение PDO.
     *
     * @return PDO Подключение к базе данных.
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
