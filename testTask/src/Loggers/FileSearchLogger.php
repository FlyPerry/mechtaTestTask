<?php

namespace vBulletin\Search\Loggers;

use Psr\Log\LoggerInterface;

class FileSearchLogger implements SearchLoggerInterface {
    private LoggerInterface $logger;

    /**
     * @param LoggerInterface $logger Логгер PSR для записи в файл.
     */
    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    /**
     * Логирование запрос поиска.
     *
     * @param string $query Запрос для логирования.
     */
    public function logQuery(string $query): void {
        $this->logger->info("Search query logged: $query");
    }
}
