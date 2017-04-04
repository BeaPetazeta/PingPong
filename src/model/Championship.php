<?php 

namespace LeanProgrammers\Model;

use LeanProgrammers\Model\Player;

class Championship
{

    /*Variables*/
    private $championshipName; //Nombre del campeonato
    public $players = array(); //Lista de nombres de los jugadores
    public $playerList = array(); //Array d eobjetos Player
    public $points = array(); //Array de puntos
    public $roundWinners = array();
    public $match = array();


	/*Cuando creamos un objeto de esta classe, el constructor espera dos variables
	con listas de players y sus puntuaciones*/
    function __construct( $name, $playerList, $pointsList=null ){
        /*Se asignan los valores de lass lista que hemos recibido en las variables de la classe*/
        /*TODO*/
        /*Hay que modificarlo para que se creen objetos de tipo PLAYER*/
        $this->championshipName = $name;
        $this->players = $playerList;
        $this->points = $pointsList;

        for ($i=0; $i < count(players) ; $i++) { 
        	$playersList[$i] = new LeanProgrammers\Model\Player($players[$i]);
        }
    }
    /*Esta funcion creará los partidos */
    function matchMate(){
    	/*TODO*/
    	/*Hay que modificarla para que se creen objetos de la clase partidos, MATCH*/
        for($i=1; $i<count($this->players); $i+=2){
            $this->match[]=[$this->players[$i],$this->players[$i+1]]; //se crea un vector con los partidos
        }
        //var_dump($match);
    }
    function showMatches(){
        //hacemos un bucle para recorrer el vector de partidos y los muestra.
        foreach ($this->match as $key => $value) {
            echo "el partido es " .$value[0] ." vs " .$value[1];
            echo "<br>";
        }
    }
    /* Esta funcion realiza los partidos y nos devuelve un ganador de partido*/
    function tournament(){
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
    function setNameChampionship( $name )
    {
    	$this->championshipName = $name;
    }
    function getNameChampionship()
    {
    	return $this->championshipName;
    }
}
/*$players = [
    1 => "Adri",
    2 => "Bea",
    3 => "Miguel",
    4 => "Emilio",
    5 => "Gabi",
    6 => "David",
    7 => "Jorge",
    8 => "Mario",
    9 => "Paco",
    10 => "Elena"
];*/
$points = [
    1 => 10 ,
    2 => 15,
    3 => 9,
    4 => 25,
    5 => 11,
    6 => 5,
    7 => 14,
    8 => 20,
    9 => 22,
    10 =>1
];
    $championship = new Championship($players,$points);
    //$player->rounds()
    //var_dump($player->rounds());
    $championship->matchMate();
    $championship->showMatches();
