<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Model\Championship;
use LeanProgrammers\Model\Player;
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
        $stmt = $pdo->prepare("SELECT championship.name from championship
                            WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch(); //solo fetch porque queremos un solo campeonato
        //Si no obtiene ninguna columna nos devuelve un nulo, para usarlo en el error de la vista.
        if (false == $result){
            return null;
        }
        $championship = new Championship($result["name"]);
        //Obtenemos de la base de datos los datos de usuario para un campeonato concreto.
        $stmt = $pdo->prepare("
            SELECT users.id,users.name,users.nick,users.email
            FROM championship_has_users
            INNER JOIN users ON users.id=championship_has_users.user
            WHERE championship=:id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetchAll();
        //le pasamos los datos a la clase player, con los datos que obtenemos de la base de datos.
        foreach ($result as $row) {
            $player = PlayerRepository::createFromRow($row);
            $championship->addplayer($player);
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
    }
}