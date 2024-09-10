<?php 

class Request {
    public $path;

    public function __construct($path)
    {
        $this->path = $path;
    }
}

