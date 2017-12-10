<?php

namespace App\Helpers\Database;

/**
 * Trait DbHelper
 * @package App\Helpers\Database
 */
trait DbHelper
{
    /**
     * @param $pdo
     * @param $database
     * @return bool
     */
    function databaseExists($pdo, $database)
    {
        // Build the query
        $query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?";

        // Prepare the query
        $stmt = $pdo->prepare($query);

        // Execute the query
        $stmt->execute(array($database));

        // Fetch the response
        $response = $stmt->fetchAll();

        // Check if there is a response and if it is an array.
        if (!empty($response) && is_array($response)) {

            // Loop trough the response array
            foreach ($response as $array) {

                // Check if the array is an array and if the SCHEMA_NAME is set and if the SCHEMA_NAME equals the
                // database name.
                if (is_array($array) && isset($array['SCHEMA_NAME']) && $array['SCHEMA_NAME'] === $database) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
        // Return false on default.
        return false;
    }

    /**
     * @return bool|PDO
     */
    function canConnect()
    {
        try {
            // Create a new pdo connection without a database.
            $pdo = new PDO(
                'mysql:host=' . $this->dbCredentials['DB_HOST'] . ';',
                $this->dbCredentials['DB_USERNAME'],
                $this->dbCredentials['DB_PASSWORD']
            );

            // Return pdo if the connection succeeded.
            return $pdo;
        } catch(PDOException $e) {

            // Return false if the connection failed.
            return false;
        }
    }
}