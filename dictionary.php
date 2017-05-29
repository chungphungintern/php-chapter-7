<?php

require_once('document.php');

class Dictionary extends Document {
    /**
     * Define document type
     */
    public function type()
    {
        return 'dictionary';
    }

    /**
     * Implement borrow steps for dictionary
     */
    public function borrow()
    {
        echo "Borrow steps for dictionary<br>";

        $this->processBorrowDocument();
    }
}