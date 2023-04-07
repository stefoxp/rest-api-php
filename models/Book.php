<?php

/**
 * Description of Book
 *
 * @author stefoxp
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

    function create()
    {
        $query = "INSERT INTO " . $this->table_name
                . " SET ISBN=:isbn, Author=:author, Title=:title;";

        $stmt = $this->conn->prepare($query);

        $this->ISBN = htmlspecialchars(strip_tags($this->ISBN));
        $this->Author = htmlspecialchars(strip_tags($this->Author));
        $this->Title = htmlspecialchars(strip_tags($this->Title));

        // binding
        $stmt->bindParam(":isbn", $this->ISBN);
        $stmt->bindParam(":author", $this->Author);
        $stmt->bindParam(":title", $this->Title);
        
        $this->view_parameters();

        // execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    function update()
    {
        $query = "UPDATE " . $this->table_name
                . " SET Author = :author, Title = :title"
                . " WHERE ISBN = :isbn";

        //echo $query;

        $stmt = $this->conn->prepare($query);

        $this->ISBN = htmlspecialchars(strip_tags($this->ISBN));
        $this->Author = htmlspecialchars(strip_tags($this->Author));
        $this->Title = htmlspecialchars(strip_tags($this->Title));

        // binding
        $stmt->bindParam(":isbn", $this->ISBN);
        $stmt->bindParam(":author", $this->Author);
        $stmt->bindParam(":title", $this->Title);
        
        //echo '<br>\n';
        $this->view_parameters();

        // execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }
    
    function view_parameters() {
        $msg = 'ISBN: ' . $this->ISBN;
        $msg .= ' Author: ' . $this->Author;
        $msg .= ' Title: ' . $this->Title;
        
        echo $msg;
    }
}
