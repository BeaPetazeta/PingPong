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

    static public function getPlayersByChampionshipId($id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM users INNER JOIN championship_has_users ON championship_has_users.user=users.id where championship_has_users.championship=:id');
        $stmt->execute([':id'=>$id]);
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
        $player->setId($row['id']);
        $player->setNick($row['nick']);
        $player->setMail($row['email']);
        return $player;
    }
    static public function register($name, $nick, $email, $password){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('INSERT INTO users (id, name, nick, email, password) VALUES (NULL, :name, :nick, :email, :password);');
        $stmt->execute([':name'=>$name, ':nick'=>$nick, ':email'=>$email, ':password'=>$password]);
        return PlayerRepository::getById($pdo->lastInsertId());
    }
    public function inscribe($championship, $player){
         $pdo = Database::getInstance();
         $stmt = $pdo->prepare('INSERT INTO championship_has_users (championship, user) VALUES (:championship, :player)');
         $stmt->execute([':championship'=>$championship->getId(),':player'=>$player->getId()]);
    }
}