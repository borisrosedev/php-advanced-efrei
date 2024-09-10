<?php

require '../../vendor/autoload.php';


class LoggerMiddleware extends Middleware {
    public function handle(Request $request, Response $response)
    {
        $response->body = "Request to ". $request->path . " was logged. ";
        parent::handle($request, $response);
    }
}