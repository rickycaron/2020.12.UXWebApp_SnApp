<?php


class database_model
{
    private $db;

    /**
     * database_model constructor
     */

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    /**
     * Here is a list of functions you can use to get information/add information in the database
     */

    public function insertUser ($username, $password, $email) {
    }

}