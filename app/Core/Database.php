<?php

namespace App\Core;

use App\Helpers\Database\LiteDbBuilder;
use App\Helpers\Database\DbHelper;
use PDO;
use PDOException;

/**
 * Class Database
 * @package App\Core
 */
class Database
{
    use DbHelper;

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

                // Create the litening database.
                new LiteDbBuilder($pdo);
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