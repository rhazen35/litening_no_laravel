<?php

namespace App\Core;

/**
 * View Class
 */
class View {
    
    function render($filename, $params) {

        include($filename);
    }

    function header() {
        
    }
}