<?php

class Library {
    private $stock = [];

    /**
     * Import document list into library
     */
    public function importDocument($documentList)
    {
        foreach ($documentList as $documentData) {
            list($document, $quantity) = $documentData;
            $this->stock[$document->type()] = $quantity;
        }
    }

    /**
     * Borrow document from the library
     */
    public function borrowDocument($document)
    {
        $documentType = $document->type();

        if (empty($this->stock[$documentType]) || $this->stock[$documentType] < 1) {
            echo "Stock is empty, cannot borrow!<br>";
            return;
        }

        // Decrease stock remain quantity
        $this->stock[$documentType] -= 1;

        $document->borrow();
    }

    /**
     * Return document to the libray
     */
    public function giveBackDocument($document)
    {
        // Increase stock remain quantity
        $this->stock[$document->type()] += 1;

        $document->giveBack();
    }

    /**
     * Get return stock of all document in library
     *
     * @return array
     */
    public function getRemainStock()
    {
        return $this->stock;
    }
}