<?php
class Book 
{
    private $title;
    private $author;
    private $price;
    private $stock;

    public function __construct($title, $author, $price, $stock){
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        $this->stock = $stock;
    }

    public function getTitle(){return $this->title;}
    public function getAthor(){return $this->author;}
    public function getPrice(){return $this->price;}
    public function getStock(){return $this->stock;}
}
