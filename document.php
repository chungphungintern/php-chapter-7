<?php

abstract class Document {
    protected $title = '';
    protected $description = '';
    protected $price = 0;
    protected $borrowTimes = 0;
    protected $giveBackTimes = 0;
    protected $otherInfo = [];

    /**
     * Constructor
     *
     * @param array $documentData
     */
    public function __construct($documentData)
    {
        foreach ($documentData as $key => $value) {
            $this->{$key} = is_string($value) ? trim($value) : $value;
        }
    }

    /**
     * Define document type
     */
    abstract public function type();

    /**
     * Borrow document from library
     */
    abstract public function borrow();

    /**
     * Magic function to set data
     *
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        $this->otherInfo[$key] = trim($value);
    }

    /**
     * Magic function to get data
     *
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if (!empty($this->otherInfo[$key])) {
            return $this->otherInfo[$key];
        }

        return '';
    }

    /**
     * Magic function to remove data
     *
     * @param string $key
     */
    public function __unset($key)
    {
        unset($this->otherInfo[$key]);
    }

    /**
     * Magic function to handler when calling undefined object method
     */
    public function __call($functionName, $args)
    {
        echo 'Calling undefined object method ' . $functionName . ' with args ' . implode(',', $args) . "\n";
    }

    /**
     * Magic function to handler when calling undefined static method
     */
    public static function __callStatic($functionName, $args)
    {
        echo 'Calling undefined static method ' . $functionName . ' with args ' . implode(',', $args) . "\n";
    }

    /**
     * Return document to the library
     */
    public function giveBack()
    {
        echo "Return " . $this->type() . " to the library";

        $this->giveBackTimes += 1;
    }

    /**
     * Get document detail info
     *
     * @return array
     */
    public function getDocumentDetail()
    {
        $commonData = [
            'title'         =>  $this->title,
            'description'   =>  $this->description,
            'price'         =>  $this->price,
            'borrowTimes'   =>  $this->borrowTimes,
            'giveBackTimes' =>  $this->giveBackTimes
        ];

        return array_merge($commonData, $this->otherInfo);
    }

    /**
     * Get borrow and give back data of a document
     *
     * @return array
     */
    public function getBorrowAndGiveBackData()
    {
        return [
            'borrow'    =>  $this->borrowTimes,
            'giveBack'  =>  $this->giveBackTimes
        ];
    }

    /**
     * Increase borrow times
     */
    protected function processBorrowDocument()
    {
        $this->borrowTimes += 1;
    }
}