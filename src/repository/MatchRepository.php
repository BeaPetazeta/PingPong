<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Framework\Database;
use LeanProgrammers\Model\Match;
use LeanProgrammers\Repository\PlayerRepository;

class MatchRepository{
    static public function getAll(){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare(
            'SELECT (
                SELECT USERS.name FROM ROUND
                INNER JOIN USERS
                WHERE ROUND.player1 = USERS.id
                AND ROUND.id = 1
            ) AS player1, (
                SELECT USERS.name FROM ROUND
                INNER JOIN USERS
                WHERE ROUND.player2 = USERS.id
                AND ROUND.id = 1
            ) AS player2'
            );
        $stmt->execute();
        $roundplayers = $stmt->fetchAll();


        foreach ($roundplayers as $rows) {
            $players1[]=$rows[0];

        }
        foreach ($roundplayers as $rows) {
            $players2[]=$rows[1];

        }

        $matches = new Match($players1,$players2);
        return $matches;
    }

    //creamos el partido pasandole una id
    static public function getById($id){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('SELECT * FROM game WHERE id=:id');
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch();
        $match = self::createFromRow($result);
        return $match;

    }
    //creamos una función para pasar los valores y tenerla generalizada
    static private function createFromRow($row){
        $player1 = PlayerRepository::getById($row['player1']);
        $player2 = PlayerRepository::getById($row['player2']);
        $match = new Match($player1,$player2);
        $match->setPointsPlayer1($row['pointsP1']);
        $match->setPointsPlayer2($row['pointsP2']);        
        $round = RoundRepository::getById($row['round_id']);
        $match->setRound($round);
        return $match;
    }

}

?>