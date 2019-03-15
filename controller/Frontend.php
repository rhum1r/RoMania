<?php

require_once '../model/ListGames.php';
require_once '../model/Comments.php';

class Frontend {

    function displayHomepage() {
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
           
        if(!empty($_POST['author']) && !empty($_POST['comment']) && isset($_POST['mark'])) {

            $commentManager->postComment($id, $_POST['author'], $_POST['comment'], $_POST['mark']);
            header('Location: http://dev.romania.com/game/'.$id);
        }
        else {
            $_SESSION['error_mess'] = "Une erreur est survenue. Veuillez Remplir tous les champs.";
            header('Location: http://dev.romania.com/game/'.$id);           
        }
    }
}
