<?php

namespace vBulletin\Search\Services;

use vBulletin\Search\Repositories\PostRepository;
use vBulletin\Search\Loggers\SearchLoggerInterface;

class SearchService
{
    private PostRepository $postRepository;
    private SearchLoggerInterface $logger;

    /**
     * @param PostRepository $postRepository Репозиторий для работы с постами.
     * @param SearchLoggerInterface $logger Логгер для записи запросов поиска.
     */
    public function __construct(PostRepository $postRepository, SearchLoggerInterface $logger)
    {
        $this->postRepository = $postRepository;
        $this->logger = $logger;
    }

    /**
     * Поиск постов по запросу.
     *
     * @param string $query Строка запроса.
     * @return array Результаты поиска.
     */
    public function search(string $query): array
    {
        $this->logger->logQuery($query);
        return $this->postRepository->searchPosts($query);
    }

    /**
     * Результаты поиска по ID.
     *
     * @param string $searchId Идентификатор поиска.
     * @return array Результаты поиска.
     */
    public function getSearchResults(string $searchId): array
    {
        return $this->postRepository->getSearchResultsById($searchId);
    }
}
