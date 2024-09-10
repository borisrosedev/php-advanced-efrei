<?php


class AuthMiddleware extends Middleware {
    public function handle(Request $request, Response $response) {
        
        if($request->path !== '/admin'){
            $response->body = "User is authenticated";
        } else {
            $response->body = "Access denied to admin page";
        }
        parent::handle($request, $response);
    }
}