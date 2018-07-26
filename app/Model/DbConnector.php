<?php

class DbConnector
{
    private $connection;
    private static $instance;
    private $HOST = "172.26.11.68";
    private $USER = "root";
    private $PASSWORD = "vagrant";
    private $DB = "vagrant";

    public static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->connection = new mysqli($this->HOST, $this->USER,
            $this->PASSWORD, $this->DB);

        if(mysqli_connect_error() || !$this->connection) {
            trigger_error("Failed to connect to to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function executeQuery($sql, ...$params)
    {
        $connect = $this->connection->prepare($sql);

        if (count($params)) {
            $connect->bind_param(...$params);
        }
        $connect->execute();

        return $connect->get_result();
    }
}