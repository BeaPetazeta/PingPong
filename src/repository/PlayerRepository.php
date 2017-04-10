<?php
namespace LeanProgrammers\Repository;

use LeanProgrammers\Framework\Database;
use LeanProgrammers\Model\Player;

class PlayerRepository
{
    static public function getAll(){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM users');
        $stmt->execute();
        $result = $stmt->fetchAll();
        $players = [];

        foreach($result as $row){
            $players[] = self::createFromRow($row);
        }

        return $players;
    }

    static public function existYet($email, $password){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
        $stmt->execute([':email'=>$email, ':password'=>$password]);        
        $result = $stmt->fetch();        
        
        if ($result != null){
            $player = self::createFromRow($result);
            return $player;
        }

    }

    static public function getById($id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch();
        $player = self::createFromRow($result);
        return $player;
    }
    static private function createFromRow($row){
        $player = new Player($row['name']);
        $player->setNick($row['nick']);
        $player->setMail($row['email']);
        return $player;
    }

}