<?php
require_once '.\..\Entities\Book.php';
require_once '.\..\Core\Database.php';
 final class BookRepository 
 {
    private $db;
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    function add_book(Book $book) {
        $stmt = $this->db->prepare("INSERT into book VALUES (?, ?, ?, ?");
        $stmt->execute([
            $book->getTitle(),
            $book->getAthor(),
            $book->getPrice(),
            $book->getStock()
        ]);
        return $stmt->rowCount() >= 1;
    }


    function checkIfAuthorExist($name) {
        $stmt = $this->db->prepare("SELECT * FROM author WHERE name = :name");
        $stmt->execute([
            ':name' => $name
        ]);
        $result = $stmt->fetch();
        return $result;
    }


    function addAuthor($author) {
        $stmt = $this->db->prepare("INSERT INTO author (name) values (:name)");
        $stmt->execute([
            ':name' => $author
        ]);
        return $stmt->rowCount() >= 1;
    }

    

    
 }
 