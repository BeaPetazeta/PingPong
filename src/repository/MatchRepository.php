<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Framework\Database;
use LeanProgrammers\Model\Match;

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
}

?>