<?php

namespace vBulletin\Search\Renderers;

class HtmlRenderer
{
    /**
     * Отрисовщик результатов поиска.
     *
     * @param array $result Массив результатов поиска.
     */
    public function render(array $result): void
    {
        foreach ($result as $row) {
            if ($row['forumid'] != 5) {
                echo "Result: " . htmlspecialchars($row['text']) . "<br>";
            }
        }
    }
}

