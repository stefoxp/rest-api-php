<?php
/**
 * Description of database
 *
 * @author stefano
 */
class Database {
    // credentials
    private $host = "localhost";
    private $db_name = "rest-library";
    private $username = "root";
    private $password = "";
    
    public $conn;
    
    // db connection
    public function getConnection()
    {
        $this->conn = null;
        try
        {
            $this->conn = new PDO("mysql:host=" . $this->host 
                                    . ";dbname=" . $this->db_name,
                                    $this->username,
                                    $this->password);
            $this->conn->exec("set names utf8");
        }
        catch (PDOException $ex)
        {
            echo("Errore di connessione: " . $ex->getMessage());
        }
        return $this->conn;
    }
}
