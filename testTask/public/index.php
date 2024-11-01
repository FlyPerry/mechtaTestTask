<?php
require_once __DIR__ . '/../vendor/autoload.php';

use vBulletin\Search\Config;
use vBulletin\Search\DatabaseConnection;
use vBulletin\Search\Repositories\PostRepository;
use vBulletin\Search\Services\SearchService;
use vBulletin\Search\Loggers\FileSearchLogger;
use vBulletin\Search\Renderers\HtmlRenderer;
use vBulletin\Search\Controllers\SearchController;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$config = new Config();
$dbConnection = new DatabaseConnection($config->getDatabaseConfig());
$postRepository = new PostRepository($dbConnection);
$logger = new FileSearchLogger(new Logger('search_log', [new StreamHandler(__DIR__ . '/../logs/search.log')]));
$renderer = new HtmlRenderer();

$searchService = new SearchService($postRepository, $logger);
$controller = new SearchController($searchService, $renderer);
$controller->handleRequest($_REQUEST);
