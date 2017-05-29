<?php

require_once('document.php');

class Book extends Document {
    /**
     * Define document type
     */
    public function type()
    {
        return 'book';
    }

    /**
     * Implement borrow steps for book
     */
    public function borrow()
    {
        echo "Borrow steps for book<br>";

        $this->processBorrowDocument();
    }
}