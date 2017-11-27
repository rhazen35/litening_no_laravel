<?php

namespace App\Helpers\Database;

use App\Enums\Database\LiteDbEnum;

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