<?php
namespace LeanProgrammers\Model;

use LeanProgrammers\Model\Player;
use LeanProgrammers\Model\Round;
use LeanProgrammers\Repository\ChampionshipRepository;

class Championship{

    /*Variables*/
    private $id;
    private $name; //Nombre del campeonato

    public $players = array(); //Lista de nombres de los jugadores
    public $playerList = array(); //Array de objetos Player
    public $points = array(); //Array de puntos

    public $roundWinners = array();
    public $match = array();

    public $gameWinners = array(); //Array donde almacenaremos los ganadores de los partidos
    public $rounds = array(); //Array de rondas




	//Cuando creamos un objeto de esta clase, el constructor espera una variable necesaria que es name. Podemos crear un torneo sin haber dado una lista de jugadores antes, por eso pasamos array vacio
    function __construct( $name, $playerList=[], $pointsList=null ){
        /*Se asignan los valores de la lista que hemos recibido en las variables de la clase*/
        $this->name = $name;
        $this->players = $playerList;
        $this->points = $pointsList;

        for ($i=0; $i < count($this->players) ; $i++) {
        	$playersList[$i] = new Player($players[$i]);
        }
    }
    public function __toString(){
        return $this->name;
    }
    /*Esta funcion creará los partidos */
    public function matchMate(){
        for($i=1; $i<count($this->players); $i+=2){
            $this->match[]= new Match ($this->players[$i],$this->players[$i+1]); //se crea un vector con los partidos
        }
    }
    //Esta función muestra los partidos
    public function showMatches(){
        //hacemos un bucle para recorrer el vector de partidos y los muestra.
       return $this->match;
    }

    /* Esta funcion realiza los partidos y nos devuelve un ganador de partido*/
    public function tournament(){
        for($i; $i<count($this->points);$i+=2){
            $match1 = new Match($this->players[$i],$this->players[$i+1]);
            $winner = $match1->setMatch($this->points[$i],$this->points[$i+1]);
                echo "<br>";
                echo "el ganador del partido es " .$winner;
                echo "<br>";
            $roundWinners[]=$winner;
            $i++;
        }
        return $roundWinners;
    }

    public function setPlayerList(  $playerList )
    {
      $this->players = $playerList;
    }

    //creamos el nombre del campeonato
    public function setName( $name )
    {
    	$this->name = $name;
    }
    //recuperamos el nombre del campeonato almacenado
    public function getName()
    {
    	return $this->name;
    }


    public function getPlayers(){
        return $this->players;
    }

    public function addPlayer($player){
        $this->players[] = $player;
    }
    //Creo la primera ronda cogiendo la lista completa de los jugadores y uniéndolos de dos en dos
    public function createFirstRound(){
        $round = new Round($this);
        $round = $round->save();
        //voy mirando la lista de jugadores para unirlos de dos en dos para crear un partido
        for($i=0; $i<count($this->players); $i+=2){
            $match=new Match ($this->players[$i],$this->players[$i+1]);
            $match->setRound($round); //añade los partidos
            $match->save();

        }

        $this->rounds[] = $round;
        return $round;
    }
    //Esta función muestra las rondas
    public function getRounds(){
       return $this->rounds;
    }

    public function setPointsMatch($match, $pointsPlayer1, $pointsPlayer2){
        $match->setPointsPlayer1($pointsPlayer1);
        $match->setPointsPlayer2($pointsPlayer2);
        $this->gameWinners[]=$match->getWinner();

        $round = new Round();

        if ($round->nextRound()){
            $this->nextRound($this->gameWinners);
        }
        echo "HOLA".$this->gameWinners;
        return $this->gameWinners;
    }

    public function nextRound($gameWinners){
        $round = new Round();
        //crear partidos con los ganadores de la primera ronda
        for ($i=0; $i < count($gameWinners); $i+2) {
            $match = new Match($gameWinners[i], $gameWinners[i+1]);
            $round->addMatch($match);
        }
        return $round;
    }
    public function save(){
        if(null != $this->id){
            ChampionshipRepository::update($this);
        }else{
            ChampionshipRepository::create($this);
        }
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function countPlayers(){
        return ChampionshipRepository::countPlayers($this);
    }
    public function hasRounds(){
        return ChampionshipRepository::hasRounds($this);
    }
    public function playerOnChamp($userId){
        $playerOnChamp = ChampionshipRepository::playerOnChamp($userId,$this->getId());
        if(null != $playerOnChamp){
            return true;
        }else{
            return false;
        }
    }
}

