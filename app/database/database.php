<?php

class Database
{
    protected $con = null;
    protected $host = 'Localhost';
    protected $db = 'sharing';
    protected $user = 'root';
    protected $pass = '';
    protected static $instance;
    public function __construct()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db;
            $user = $this->user;
            $pass = $this->pass;
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE,
                PDO::ATTR_PERSISTENT => TRUE,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );
            $this->con = new PDO($dsn, $user, $pass, $options);
            return $this->con;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function getmyDB()
    {
        if ($this->con instanceof PDO) {
            return $this->con;
        }
    }
    public function close()
    {
        $this->con = null;
    }
}
