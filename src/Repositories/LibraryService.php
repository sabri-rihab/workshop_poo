<?php
require_once 'BookRepository.php';
require_once '.\..\Entities\Author.php';
require_once '.\..\Entities\Book.php';

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