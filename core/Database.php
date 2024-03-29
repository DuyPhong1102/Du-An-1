<?php
class Database
{
    private $conn;
    private $server_name = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "duan1";

    function __construct()
    {

        try {
            $dsn = 'mysql:dbname=' . ($this->db_name) . ';host=' . ($this->server_name);

            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $this->conn = new PDO($dsn, $this->username, '', $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $exception) {
            $mess = $exception->getMessage();
            die($mess);
        }
    }

    function insert($table, $data)
    {

        if (!empty($data)) {
            $fieldStr = '';
            $valueStr = '';
            foreach ($data as $key => $value) {
                $fieldStr .= $key . ',';
                $valueStr .= "$value" . ',';
            }
            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table ($fieldStr) VALUES ($valueStr)";


            $status = $this->query($sql);
            if ($status) {
                return true;
            }
        }
    }
    function update($table, $data, $condition = '')
    {

        if (!empty($data)) {
            $updateStr = '';

            foreach ($data as $key => $value) {
                $updateStr .= "$key=$value,";
            }
            $updateStr = rtrim($updateStr, ',');

            if (!empty($condition)) {
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            } else {
                $sql = "UPDATE $table SET $updateStr ";
            }

            $status = $this->query($sql);

            if ($status) {
                return true;
            }
        }
    }
    function delete($table, $condition = '')
    {

        if (!empty($condition)) {
            $sql = "DELETE FROM `$table` WHERE $condition";
        } else {
            $sql = "DELETE FROM '.$table.'";
        }


        $status = $this->query($sql);

        if ($status) {
            return true;
        }
    }

    function query($sql)
    {
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        return $statement;
    }
    function deleteMultipleById($table, $array)
    {
        $data = implode(",", $array);
        $sql = "DELETE FROM $table WHERE id in ($data)";
        $status = $this->query($sql);

        if ($status) {
            return true;
        }
    }

    function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }
}
