<?php

/**
 * ---------------------------------------
 * Configuration file for the database(s).
 * ---------------------------------------
 */

function dbCredentials()
{
    return [
        'DB_CONNECTION' => "mysql",
        'DB_HOST'       => "127.0.0.1",
        'DB_PORT'       => "3306",
        'DB_DATABASE'   => "litening",
        'DB_USERNAME'   => "litening",
        'DB_PASSWORD'   => "secret"
    ];
}