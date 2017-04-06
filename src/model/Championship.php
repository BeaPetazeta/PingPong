<?php
namespace LeanProgrammers\Model;
use LeanProgrammers\Model\Player;

class Championship{

    /*Variables*/
    private $name; //Nombre del campeonato

    public $players = array(); //Lista de nombres de los jugadores
    public $points = array(); //Array de puntos
    public $gameWinners = array();
    public $rounds = array(); //Array de rondas


	//Cuando creamos un objeto de esta clase, el constructor espera una variable necesaria que es name. Podemos crear un torneo sin haber dado una lista de jugadores antes, por eso pasamos array vacio
    function __construct( $name, $players=[], $pointsList=null ){
        /*Se asignan los valores de la lista que hemos recibido en las variables de la clase*/
        $this->name = $name;
        $this->points = $pointsList;

        for ($i=0; $i < count($this->players) ; $i++) {
        	$players[$i] = new Player($players[$i]);
        }
    }

    function setPlayers( $players )
    {
      $this->players = $players;
    }

    //creamos el nombre del campeonato
    function setName( $name )
    {
    	$this->name = $name;
    }

    //recuperamos el nombre del campeonato almacenado
    function getName()
    {
    	return $this->name;
    }

    function getPlayers(){
        return $this->players;
    }

    public function addPlayer($name){
        $player = new Player($name);
        $this->players[] = $player;
    }
    //Creo la primera ronda cogiendo la lista completa de los jugadores y uniéndolos de dos en dos
    function createFirstRound(){
        $round = new Round();
        //voy mirando la lista de jugadores para unirlos de dos en dos para crear un partido
        for($i=0; $i<count($this->players); $i+=2){
            $round->addMatch(new Match ($this->players[$i],$this->players[$i+1])); //añade los partidos
        }

        $this->rounds[] = $round;
        return $round;
    }
    //Esta función muestra las rondas
    function getRounds(){
       return $this->rounds;
    }

}
