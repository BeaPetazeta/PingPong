<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Model\Championship;
use LeanProgrammers\Framework\Database;

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

}