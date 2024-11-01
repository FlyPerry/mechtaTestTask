<?php

namespace vBulletin\Search\Loggers;

/**
 * Определяет интерфейс логгера для записи запросов поиска.
 */
interface SearchLoggerInterface {
    /**
     * Логирует запрос поиска.
     *
     * @param string $query Запрос для логирования.
     */
    public function logQuery(string $query): void;
}
