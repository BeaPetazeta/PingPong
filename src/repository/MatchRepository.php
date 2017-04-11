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
                SELECT USERS.name FROM GAME
                INNER JOIN USERS
                WHERE GAME.player1 = USERS.id
                AND GAME.id = 1
            ) AS player1, (
                SELECT USERS.name FROM GAME
                INNER JOIN USERS
                WHERE GAME.player2 = USERS.id
                AND GAME.id = 1
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
        $match->setDate($row['date']);
        $match->setPointsPlayer1($row['pointsP1']);
        $match->setPointsPlayer2($row['pointsP2']);
        $round = RoundRepository::getById($row['round_id']);
        $match->setRound($round);
        return $match;
    }
    static public function getAllByPlayerId($playerId){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare('
            SELECT * FROM game
            INNER JOIN USERS AS P1
            ON GAME.player1 = P1.id
            INNER JOIN USERS AS P2
            ON GAME.player2 = P2.id
            INNER JOIN round
            ON game.round_id=round.id
            WHERE player1=:id OR player2=:id
            ORDER BY date DESC');
        $stmt->execute([':id'=>$playerId]);
        $result = $stmt->fetchAll();
        $matches = [];
        foreach($result as $row){
            $matches[] = self::createFromRow($row);
        }
        return $matches;
    }
    static public function create($match){
        $pdo = Database::getInstance();

        $stmt = $pdo->prepare('INSERT INTO game (round_id, `date`, pointsP1, pointsP2, player1, player2) VALUES (:round_id, :matchDate, :pointsP1, :pointsP2, :idPlayer1, :idPlayer2)');
        $stmt->execute([':round_id'=>$match->getRound()->getId(), ':matchDate'=>$match->getDate(), ':pointsP1'=>$match->getPointsPlayer1(), ':pointsP2'=>$match->getPointsPlayer2(), ':idPlayer1'=>$match->getPlayer1()->getId(), ':idPlayer2'=>$match->getPlayer2()->getId()]);
    }
}

?>