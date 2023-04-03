<?php

/**
 * Description of Book
 *
 * @author stefano
 */
class Book {
    private $conn;
    private $table_name = "books";
    
    // book's properties
    public $ISBN;
    public $Author;
    public $Title;
    
    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    function read()
    {
        $query = "SELECT b.ISBN, b.Author, b.Title"
                . " FROM " . $this->table_name . " b ";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }
    
}
