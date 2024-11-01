<?php

namespace vBulletin\Search\Repositories;

use vBulletin\Search\DatabaseConnection;
use PDO;

class PostRepository
{
    private PDO $db;

    /**
     * @param DatabaseConnection $database Подключение к бд
     */
    public function __construct(DatabaseConnection $database)
    {
        $this->db = $database->getConnection();
    }

    /**
     * Поиск постов по запросу.
     *
     * @param string $query Запрос
     * @return array Результаты .
     */
    public function searchPosts(string $query): array
    {
        $sth = $this->db->prepare('SELECT * FROM vb_post WHERE text LIKE :query');
        $sth->execute(['query' => '%' . $query . '%']);
        return $sth->fetchAll();
    }

    /**
     * Получение результатов поиска по ID.
     *
     * @param string $searchId Идентификатор поиска.
     * @return array Результаты поиска.
     */
    public function getSearchResultsById(string $searchId): array
    {
        $sth = $this->db->prepare('SELECT * FROM vb_searchresult WHERE searchid = :searchid');
        $sth->execute(['searchid' => $searchId]);
        return $sth->fetchAll();
    }
}
