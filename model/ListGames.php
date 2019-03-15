<?php
require_once 'DbConnect.php';

class ListGames extends DbConnect {
    
    public function getGames() {

        $req = static::$db->prepare('SELECT * FROM games');
        $req->execute(array());
        return $req->fetchAll();
    }
    
    public function getGame($id) {

        $req = static::$db->prepare('SELECT  g.id, g.game_name, g.platform, g.price, g.descp, g.image_url, g.brand_id, g.configMin, g.configRec, '
                                   .'b.name, b.url_logo '
                                   .'FROM games AS g ' 
                                   .'INNER JOIN brand AS b '
                                   .'ON g.brand_id = b.id '
                                   .'WHERE g.id = ' .$id);
        $req->execute(array());
        return $req->fetch();
    }
}