<?php

class Router {
    
    private $uriParameters;
    
    public function __construct() {
        
        $uri = substr($_SERVER['REQUEST_URI'], 1);
        $this->uriParameters = explode('/', $uri);
    }
    
    function run() {
        
        $controller = new Frontend();        
        
        if($this->uriParameters[0] == "" || $this->uriParameters[0] == "homepage" ) {
            $controller->displayHomepage();
        }
        
        if($this->uriParameters[0] == "game") {
            $id = $this->uriParameters[1];
            $controller->displayGamePage($id);
        }      
        
        if($this->uriParameters[0] == "postComment") {
            $author = $_POST['author'];
            $comment = $_POST['comment'];
            $id = $this->uriParameters[1];
            $controller->addComment($id);    
        }      
    }
}