<?php

require_once 'DbHandler.php';

class MySQLHandler implements DbHandler {
    private $conn;
    private $table;

    public function __construct($table) {
        $this->table = $table;
        $this->connect();
    }

    public function connect() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conn->connect_error) {
            if (DEBUG_MODE) echo "Connection failed: " . $this->conn->connect_error;
            return false;
        }
        return true;
    }

    public function disconnect() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function get_data($fields = array(), $start = 0) {
        $fields_list = empty($fields) ? "*" : implode(",", $fields);
        $query = "SELECT $fields_list FROM $this->table LIMIT $start, " . RECORDS_PER_PAGE;

        if (DEBUG_MODE) echo "<pre>$query</pre>";

        $result = $this->conn->query($query);
        $data = [];

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = array_change_key_case($row, CASE_LOWER);
            }
        }

        return $data;
    }

    public function get_record_by_id($id, $primary_key) {
        $query = "SELECT * FROM $this->table WHERE $primary_key = $id";

        if (DEBUG_MODE) echo "<pre>$query</pre>";

        $result = $this->conn->query($query);

        if ($result) {
            return array_change_key_case($result->fetch_assoc(), CASE_LOWER);
        }

        return [];
    }

    public function getConnection() {
        return $this->conn;
    }
    
}
