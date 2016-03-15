<?php

class BaseModel
{
    protected static $db;

    public function __construct()
    {
        if(self::$db == null){
            self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if(self::$db->connect_errno){
                die("Cannot connect to database");
            }
            self::$db->set_charset("utf8");
        }
    }

    public function getAll($table, $offset, $pageSize){
        $smt = self::$db->query("SELECT * FROM $table LIMIT $pageSize OFFSET $offset");
        return $smt->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($table, $id){
        $smt = self::$db->prepare("SELECT * FROM $table WHERE id = ?");
        $smt->bind_param("i", $id);
        $smt->execute();
        return $smt->get_result()->fetch_assoc();
    }

    public function create($table, $params){
        $keys = array_keys($params);
        $values = array();

        foreach ($params as $key => $value) {
            $values[] = "'". self::$db->real_escape_string($value). "'";
        }

        $keys = implode($keys, ',');
        $values = implode($values, ',');

        $query = "INSERT INTO $table ($keys) VALUES ($values)";

        self::$db->query($query);

        return self::$db->affected_rows;
    }

    public function edit($table, $columns, $id){
        $query = "UPDATE $table SET";

        foreach ($columns as $key => $value) {
            $query .= "$key = '". self::$db->real_escape_string($value). "',";
        }
        $query = rtrim($query, ",");
        $query .= " WHERE id = $id";

        self::$db->query($query);

        return self::$db->affected_rows;
    }

    public function delete($table, $id){
        $smt = self::$db->prepare( "DELETE FROM $table WHERE id = ?");
        $smt->bind_param("i", $id);
        $smt->execute();

        return $smt->affected_rows;
    }


}