<?php

include 'library.php';
include 'book.php';
include 'comic.php';
include 'dictionary.php';

$library = new Library();

$book = new Book([
    'title'         =>  'PHP',
    'bookAuthor'   =>  'Me'
]);

$comic = new Comic([
    'title'         =>  'Conan',
    'price'         =>  5000,
    'comicAuthor'  =>  'Conan Doyle'
]);

$dictionary = new Dictionary([
    'title'         =>  'V-E',
    'publishDate'  =>  '2017-05-29'
]);

echo "<h3>Get detail info of all document</h3>";

var_dump($book->getDocumentDetail());

var_dump($comic->getDocumentDetail());

var_dump($dictionary->getDocumentDetail());

echo "<h3>Import document into library</h3>";

$library->importDocument([
    [$book, 1],
    [$comic, 100],
    [$dictionary, 10]
]);

echo "<h3>Get remain stock of documents in the library</h3>";

var_dump($library->getRemainStock());

echo "<h3>Borrow 2 book and 1 dictionary from library</h3>";

$library->borrowDocument($book);
$library->borrowDocument($book);
$library->borrowDocument($dictionary);

echo "<h3>Get remain stock of documents in the library after borrow document</h3>";

var_dump($library->getRemainStock());

echo "<h3>Return 1 book to the library</h3>";

$library->giveBackDocument($book);

echo "<h3>Get remain stock of documents in the library after return document</h3>";

var_dump($library->getRemainStock());

echo "<h3>Get borrow and return info of book</h3>";

var_dump($book->getBorrowAndGiveBackData());

echo "<h3>Get borrow and return info of comic</h3>";

var_dump($comic->getBorrowAndGiveBackData());

echo "<h3>Get borrow and return info of dictionary</h3>";

var_dump($dictionary->getBorrowAndGiveBackData());

echo "<h3>Display message when calling undefined object method </h3>";

$book->abc(1, 2);

echo "<h3>Display message when calling undefined static method </h3>";

$book::xyz(3, 4);