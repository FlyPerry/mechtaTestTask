<?php

namespace vBulletin\Search\Controllers;

use vBulletin\Search\Services\SearchService;
use vBulletin\Search\Renderers\HtmlRenderer;

class SearchController
{
    private SearchService $searchService;
    private HtmlRenderer $renderer;

    /**
     * @param SearchService $searchService Сервис для обработки логики поиска.
     * @param HtmlRenderer $renderer Рендерер для отображения результатов.
     */
    public function __construct(SearchService $searchService, HtmlRenderer $renderer)
    {
        $this->searchService = $searchService;
        $this->renderer = $renderer;
    }

    /**
     * Обработка HTTP request с фронта
     *
     * @param array $request Массив с параметрами запроса (например, $_REQUEST).
     */
    public function handleRequest(array $request): void
    {
        if (isset($request['q']) && !empty($request['q'])) {
            $results = $this->searchService->search($request['q']);
            $this->renderer->render($results);
        } elseif (isset($request['searchid']) && !empty($request['searchid'])) {
            $results = $this->searchService->getSearchResults($request['searchid']);
            $this->renderer->render($results);
        } else {
            echo "<h2>Search in forum</h2><form><input name='q'></form>";
        }
    }
}
