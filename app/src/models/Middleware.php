<?php

require '../../vendor/autoload.php';

// use \App\Models\Reponse;
// use \App\Models\Request;

class Middleware {
    protected $next;


    public function __construct($next) 
    {
        $this->next = $next;
    }

    public function handle(Request $request, Response $response) 
    {
        if($this->next){
            return $this->next->handle($request, $response);
        }
    }
}