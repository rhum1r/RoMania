<?php


class DbConnect {
    
    static protected $db = null;
    const MAX_IMAGE_SIZE = 2000;
    
    public function __construct() {
        // Fonction de connection à la bdd 'games_shop'
        try {
            self::$db = new PDO('mysql:host=localhost;dbname=games_shop;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
    public static function getInstance()
    {
        if(is_null($db)){
            new DbConnect();
        }
        return self::$db;
    }
}