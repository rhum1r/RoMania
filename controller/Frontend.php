<?php

require_once '../model/ListGames.php';
require_once '../model/Comments.php';

class Frontend {

    function displayHomepage() {
        $_SESSION['error_mess'] = ""; /////////////////////////////////////////////// !!!!!!!!!!!!!!!!!!!!!!!!
        $listGamesManager = new ListGames();
        $games = $listGamesManager->getGames();
        require '../views/tempHomePage.php';
    }

    function displayGamePage($id) {
        $listGamesManager = new ListGames();
        $commentManager = new Comments();
        
        $game = $listGamesManager->getGame($id);
        $comments =  $commentManager->getComments($id);
       
        
        require '../views/tempGamePage.php';
    }
    
    function addComment($id) {
        
        $commentManager = new Comments();
        $response = ['success'=>false];
        
        if(!empty($_POST['author']) && !empty($_POST['comment']) && isset($_POST['mark'])) {

            $lastid = $commentManager->postComment($id, $_POST['author'], $_POST['comment'], $_POST['mark']);
            
            $comment = $commentManager->getCommentById($lastid);
            
            ob_start();
                include '../views/tempComments.php';
            $template = ob_get_clean();
            
            $response['success']= true;
            $response['template'] = $template;
            
        }
        else {
            $response['message'] = "Une erreur est survenue. Veuillez Remplir tous les champs.";    
        }
    
        $json = json_encode($response);
        
        
        
        echo $json;
        die;
    }
}
