<?php

require_once('document.php');

class Comic extends Document {
    /**
     * Define document type
     */
    public function type()
    {
        return 'comic';
    }

    /**
     * Implement borrow steps for comic
     */
    public function borrow()
    {
        echo "Borrow steps for comic<br>";

        $this->processBorrowDocument();
    }
}