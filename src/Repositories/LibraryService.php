<?php
require_once 'BookRepository.php';
require_once '.\..\Entities\Author.php';
require_once '.\..\Entities\Book.php';


if(isset($_POST['display'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $repo = new BookRepository;
    if(empty($repo->checkIfAuthorExist($author))){
        // $new_author = new Author($author);
        $repo->addAuthor($author);
    }
    $result = $repo->checkIfAuthorExist($author);
    $author_id = $result['_id'];
    $new_book = new Book($title, $author_id, $price, $stock);
    $repo->add_book($new_book);
    $books_arr = $repo->readAll();
    foreach($books_arr as $book){
        echo "Title : ".$book['title'] . " AuthorName :" . $book['AuthorName'] . " Price : " . $book['price'] . " Stock : " . $book['stock'] . "<br>";
    }
}
    $repo = new BookRepository;
    $books_arr = $repo->readAll();
    foreach($books_arr as $book){
        echo "Title : ".$book['title'] . " AuthorName :" . $book['AuthorName'] . " Price : " . $book['price'] . " Stock : " . $book['stock'] . "<br>";
    }

// search
// if(isset($_POST['search'])){
    print_r($_GET);
    $repo = new BookRepository;
    $book_title = $_GET['search'];
    // $book_title = "livre";
    $books = $repo->find_book_by_title($book_title);
    echo"<br><br><br>";
    foreach($books as $book){
        echo "Title : ".$book->getTitle() . " AuthorName :" . $book->getAthor() . " Price : " . $book->getPrice() . " Stock : " . $book->getStock() . "<br>";
    }
// }