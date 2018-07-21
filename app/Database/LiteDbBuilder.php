<?php

namespace App\Database;

use App\Enums\Database\LiteDbEnum;
use App\Database\LiteDbSchema;
use App\Core\Database;

/**
 * Lite Database Builder Class.
 */
class LiteDbBuilder
{

    /**
     * Create the Litening database.
     *
     * @param object $pdo
     * @return bool
     */
    public function createDatabase($pdo)
    {
        // Set the statement.
        $stmt = $pdo->prepare("CREATE SCHEMA IF NOT EXISTS " . LiteDbEnum::LITENING_DB_NAME);

        // Execute the statement and return true or false when succeeded or not.
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Create Tables
     *
     * @param object $pdo
     * @return void
     */
    public function createTables($pdo) {
        // User Table
        $queryArray[] = (new LiteDbSchema())->create("users", [
            ['column' => "id", 'type' => 'increments'],
            ['column' => "name", 'type' => 'string'],
            ['column' => "email", 'type' => 'string'],
            ['column' => "deleted", 'type' => 'integer'],
            ['column' => "created_at", 'type' => 'datetime'],
            ['column' => "created_by", 'type' => 'integer'],
            ['column' => "updated_at", 'type' => 'datetime'],
            ['column' => "updated_by", 'type' => 'integer']
        ]);

        // User Login Table
        $queryArray[] = (new LiteDbSchema())->create("user_login", [
            ['column' => "id", 'type' => 'increments'],
            ['column' => "user_id", 'type' => 'integer'],
            ['column' => "first_login", 'type' => 'datetime'],
            ['column' => "current_login", 'type' => 'datetime'],
            ['column' => "last_login", 'type' => 'datetime'],
            ['column' => "deleted", 'type' => 'integer'],
            ['column' => "created_at", 'type' => 'datetime'],
            ['column' => "created_by", 'type' => 'integer'],
            ['column' => "updated_at", 'type' => 'datetime'],
            ['column' => "updated_by", 'type' => 'integer']
        ]);

        // Connect to the database.
        $pdo  = (new Database())->connectPDO(); 
        // Loop through the query array and execute each query.
        foreach ($queryArray as $query) {
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        }
    }
}