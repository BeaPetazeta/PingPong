<?php
namespace LeanProgrammers\Repository;

use LeanProgrammers\Framework\Database;
use LeanProgrammers\Model\Player;

class PlayerRepository
{
    static public function getAll(){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT name FROM users');
        $stmt->execute();
        $result = $stmt->fetchAll();
        $players = [];

        foreach($result as $row){
            $players[] = new Player($row['name']);
        }

        return $players;
    }

    static public function getById($id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch();
        $player = self::createFromRow($result);
        return $player;
    }

    static public function createFromRow($row){
        $player = new Player($row['name']);
        $player->setId($row['id']);
        $player->setEmail($row['email']);
        $player->setNick($row['nick']);
        return $player;
    }



}