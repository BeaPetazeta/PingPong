<?php

namespace LeanProgrammers\Repository;

use LeanProgrammers\Framework\Database;
use LeanProgrammers\Model\Round;

class RoundRepository{
	public function getById($id){
		$pdo = Database::getInstance();
        $stmt = $pdo->prepare( "SELECT * FROM round WHERE id = :id");
        $stmt->execute([':id'=>$id]);
        $result = $stmt->fetch();
	} 

}

?>
