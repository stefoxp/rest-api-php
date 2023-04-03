<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once('../config/Database.php');
include_once('../models/Book.php');

$database = new Database();
$db = $database->getConnection();

$book = new Book($db);

$stmt = $book->read();
$num = $stmt->rowCount();

if($num > 0) {
    $books_arr = array();
    $books_arr["records"] = array();
    
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        print_r($row);
        
        extract($row);
        $book_item = array(
            "ISBN"   => $ISBN,
            "Author" => $Author,
            "Title"  => $Title
        );
        array_push($books_arr["records"], $book_item);
    }
    echo json_encode($books_arr);
} else {
    echo( json_encode(
            array("message" => "Nessun libro trovato.")
    ));
}
