<?php
abstract class MySqlDao {

    protected $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
}
?>
