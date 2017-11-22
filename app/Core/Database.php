<?php

namespace App\Core;

use PDO;
use PDOException;

/**
 * Class Database
 * @package App\Core
 */
class Database
{
    /**
     * @var array
     */
    private $dbCredentials;

    /**
     * @var PDO
     */
    private $connection;

    /**
     * Database constructor.
     */
    function __construct()
    {
        // Require the database configuration file.
        require_once rootDir() . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR . "database.config.php";

        // Set the db credentials.
        $this->dbCredentials = dbCredentials();

        // Set pdo to the database server connection method.
        $pdo = $this->canConnect();

        // Continue if pdo is not false.
        if (false !== $pdo) {

            // Continue if the database exists
            if (true === $this->databaseExists($pdo, $this->dbCredentials['DB_DATABASE'])) {

                // Set the connection.
                $this->connection = $this->connectPDO();

            } else {
                print "Error!: Could not connect to the database, the database does not exists!";
                die();
            }
        } else {
            print "Error!: Could not connect to the database server!";
            die();
        }
        // Unset the db credentials.
        unset($this->dbCredentials);
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
     * @return PDO
     */
    function connectPDO()
    {
        try {
             return new PDO(
                'mysql:host=' . $this->dbCredentials['DB_HOST'] . ';
                 dbname=' . $this->dbCredentials['DB_DATABASE'],
                 $this->dbCredentials['DB_USERNAME'],
                 $this->dbCredentials['DB_PASSWORD']
            );
        } catch(PDOException $e) {

            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}