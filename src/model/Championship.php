<?php 

namespace LeanProgrammers\Model;

use LeanProgrammers\Model\Player;

class Championship
{
    /*Variables*/
    private $name; //Nombre del campeonato

    public $players = array(); //Lista de nombres de los jugadores
    public $playerList = array(); //Array de objetos Player
    public $points = array(); //Array de puntos
    public $roundWinners = array();
    public $match = array();

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

    /*Esta funcion creará los partidos */
    function matchMate(){
        for($i=1; $i<count($this->players); $i+=2){
            $this->match[]= new Match ($this->players[$i],$this->players[$i+1]); //se crea un vector con los partidos
        }
    }
  
    //Esta función muestra los partidos
    function getMatches(){
        //hacemos un bucle para recorrer el vector de partidos y los muestra.
       return $this->match;
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

    function setPlayerList( $playerList )
    {
      $this->players = $playerList;
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
        return $this->playerList;        
    }

    public function addPlayer($name){
        //var_dump($name);
        $player = new Player($name);
        $this->playerList[] = $player;
    }
}
