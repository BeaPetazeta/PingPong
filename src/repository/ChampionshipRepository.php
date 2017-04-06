<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Model\Championship;
use LeanProgrammers\Framework\Database;
use LeanProgrammers\Repository\playerrepository;

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
        $stmt = $pdo->prepare("SELECT championship.name AS champ, users.name FROM users 
                            INNER JOIN championship_has_users 
                            ON users.id=championship_has_users.user
                            INNER JOIN championship
                            ON championship_has_users.championship=championship.id
                            WHERE championship_has_users.championship=:id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetchAll(); //solo fetch porque queremos un solo campeonato
        
        $championship = new Championship($result[0]["champ"]);
        //var_dump($championship->getName());
        //var_dump($result[0]['name']);
        foreach ($result as $row) {
            $championship->addplayer($row['name']);
        }
        
        return $championship;
    }
    /* Esta funcion hace la consulta a la bbdd donde nos devolverá, a partir de un id,(id de championship) la lista de jugadores de un campeonato*/
     static public function getPlayersById($id){

        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT users.name FROM users 
                            INNER JOIN championship_has_users 
                            ON users.id=championship_has_users.user 
                            WHERE championship_has_users.championship=:id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetchall();

        foreach($result as $row){
            $players[] = new Player($row['name']);
        }

        return $players; 
        //var_dump($result);
        
             

        
    }

}