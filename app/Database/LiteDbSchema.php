<?php

Namespace App\Database;

class LiteDbSchema {

    public function create($tableName, $columnList) {

        $query  = "CREATE TABLE IF NOT EXISTS " . $tableName;
        $query .= "(";

        $totalColumns = count($columnList);
        $i            = 0;
        $primary_key  = null;
        foreach ($columnList as $column) {
            $query .= $this->createColumn($column);
            if ($i < ($totalColumns - 1)) {
                $query .= ", ";
            }

            if ("increments" === $column['type'] && "id" === $column['column']) {
                $primary_key = ", PRIMARY KEY (id)";
            }

            $i++;
        }

        if (null !== $primary_key) {
            $query .= $primary_key;
        }

        $query .= ")";

        return $query;
    }

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