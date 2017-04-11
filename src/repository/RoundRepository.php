<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Framework\Database;
use LeanProgrammers\Model\Round;
use LeanProgrammers\Repository\ChampionshipRepository;

class RoundRepository{
	public function getById($id){
		$pdo = Database::getInstance();
        $stmt = $pdo->prepare( "SELECT * FROM round WHERE id = :id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch();
        $round = self::createFromRow($result);
        return $round;
	}
    static private function createFromRow($row){
        $championship = ChampionshipRepository::getById($row['championship_id']);
        $round = new Round($championship);
        return $round;
    }
    public function create($round){
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("INSERT INTO round (championship_id) VALUES (:id)");
        $stmt->execute([':id'=>$round->getChampionship()->getId()]);
        $round->setId($pdo->lastInsertId());
        return $round;
    }
}

?>
