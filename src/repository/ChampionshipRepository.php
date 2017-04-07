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
        $stmt = $pdo->prepare("SELECT name FROM championship where id=:id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch(); //solo fetch porque queremos un solo campeonato
        
        $championship = new Championship($result["name"]);


        return $championship;
    }

}