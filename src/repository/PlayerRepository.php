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

        foreach($result as $row){
            $players[] = new Player($row['name']);
        }

        return $players;
    }
}