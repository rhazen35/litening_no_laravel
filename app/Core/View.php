<?php

namespace App\Core;

/**
 * View Class
 */
class View {
    
    /**
     * Render a page with a given file name and optional params
     *
     * @param string $filename
     * @param array $params
     * @return void
     */
    function render(string $filename, array $params = []) {
        include(views() . "main" . DIRECTORY_SEPARATOR . "header.php");
        include($filename);
        include(views() . "main" . DIRECTORY_SEPARATOR . "footer.php");
    }
}