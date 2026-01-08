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

    //---------------------     read all    --------------------
    public function readAll(){
        $stmt = $this->db->prepare("SELECT b.title , a.name as 'AuthorName', b.price, b.stock
            FROM book b
            LEFT JOIN  author a on a._id = b.author_id;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    //---------------------     find book by title    --------------------
    public function find_book_by_title($title){
        $stmt = $this->db->prepare("SELECT b.title , a.name as 'AuthorName', b.price, b.stock
            FROM book b
            LEFT JOIN  author a on a._id = b.author_id
            where b.title = :title;
            ");

        $stmt->execute([':title' => $title]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $books = [];
        foreach($result as $book){
            $books[] = new Book ($book['title'], $book['AuthorName'], $book['price'], $book['stock']);
        }
        return $books;
    }



    function add_book(Book $book) {
        $stmt = $this->db->prepare("INSERT into book(`title`, `author_id`, `price`, `stock`) VALUES (?, ?, ?, ?)");
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
 