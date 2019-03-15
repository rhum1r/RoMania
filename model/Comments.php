<?php
require_once 'DbConnect.php';

class Comments extends DbConnect {
    
    // Récupère l'ensemble des commentaires liés à un jeu
    public function getComments($id) {
        
        $req = static::$db->prepare('SELECT id, idGame, comment, author, mark, user_img, DATE_FORMAT(add_date, '
                            . '\'%d/%m à %Hh%im\') as date FROM game_comments WHERE idGame = ' .$id
                            . ' ORDER BY add_date DESC');
        $req->execute(array());
        return $req->fetchAll();
    }
    
    public function postComment($id, $author, $comment, $mark) {
        
        $req = static::$db->prepare('INSERT INTO game_comments (idGame, comment, author, mark, add_date) ' 
                                   .'VALUES (?, ?, ?, ?, NOW() )');

        $req->execute(array($id, $comment, $author, $mark));
        return $req;
    }
    
}