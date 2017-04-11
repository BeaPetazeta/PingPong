<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Model\Championship;
use LeanProgrammers\Framework\Database;
use LeanProgrammers\Repository\PlayerRepository;

class ChampionshipRepository{
//devuelve lista de campeonatos
    static public function getAll(){
    	$pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT name FROM championship');
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
//devuelve el campeonato introduciendole un id
    static public function getById($id){

		$pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM championship where id=:id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch(); //solo fetch porque queremos un solo campeonato

        $championship = self::createFromRow($result);


        return $championship;
    }

    static private function createFromRow($row){
        $championship = new Championship($row["name"]);
        $championship->setId($row['id']);
        $players = PlayerRepository::getPlayersByChampionshipId($row['id']);
        foreach($players as $player){
            $championship->addPlayer($player);
        }
        return $championship;
    }

    public function update($championship){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('
            UPDATE championship
            SET name=:name
            WHERE id=:id ');
        $stmt->execute([':name'=>$championship->getName(),':id'=>$championship->getId()]);
    }
    public function countPlayers(){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT COUNT(user) AS cont FROM championship_has_users');
        $stmt->execute();
        $players = $stmt->fetch();
        return $players['cont'];
    }
    public function hasRounds($id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT id FROM round WHERE championship_id=:id');
        $stmt->execute([':id'=>$id]);
        $rounds = $stmt->fetch();
        return $rounds;
    }
    public function playerOnChamp($userId,$champId){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT user FROM championship_has_users WHERE user=:user_id AND championship=:champ_id');
        $stmt->execute([':user_id'=>$userId, ':champ_id'=>$champId]);
        $activeUser = $stmt->fetch();
        return $activeUser;
    }
}