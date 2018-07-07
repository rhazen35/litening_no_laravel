<?php

namespace App\Database;

use App\Enums\Database\LiteDbEnum;

/**
 * Lite Database Builder.
 */
class LiteDbBuilder
{

    function __construct($pdo)
    {
        if (true === $this->createDatabase($pdo)) {
            //$this->createTables($pdo);
        }
    }

    function createDatabase($pdo) {

        $query = "CREATE SCHEMA IF NOT EXISTS " . LiteDbEnum::LITENING_DB_NAME;

        $stmt = $pdo->prepare($query);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}