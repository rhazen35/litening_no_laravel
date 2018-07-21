<?php

Namespace App\Database;

/**
 * Lite DB Schema Class.
 */
class LiteDbSchema {

    /**
     * Create a Schema
     *
     * @param string $tableName
     * @param arraz $columnList
     * @return string
     */
    public function create($tableName, $columnList) {
        // Start the query.
        $query  = "CREATE TABLE IF NOT EXISTS " . $tableName;
        $query .= "(";

        // Loop trough the column list and add each column to the querz.
        $totalColumns = count($columnList);
        $i            = 0;
        $primary_key  = null;
        foreach ($columnList as $column) {
            $query .= $this->createColumn($column);
            if ($i < ($totalColumns - 1)) {
                $query .= ", ";
            }
            // Add the primary kez.
            if ("increments" === $column['type'] && "id" === $column['column']) {
                $primary_key = ", PRIMARY KEY (id)";
            }
            $i++;
        }
        if (null !== $primary_key) {
            $query .= $primary_key;
        }
        $query .= ")";
        // Return the query.
        return $query;
    }

    /**
     * Create a column.
     *
     * @param [type] $array
     * @return void
     */
    public function createColumn($array) {

        $column = $array['column'];
        switch ($array['type']) {
            case 'increments':
                $column .= " INT(11) NOT NULL AUTO_INCREMENT";
                break;
            case'string':
                $column .= " VARCHAR(255) NOT NULL";
                break;
            case'integer':
                $column .= " INT(11) NOT NULL";
                break;
            case'datetime':
                $column .= " DATETIME";
                break;
        }
        return $column;
    }
}