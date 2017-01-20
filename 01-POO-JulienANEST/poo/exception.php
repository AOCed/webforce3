<?php 

class MonException extends Exception {
	protected $message = "Mon message";
}

class Demo {
	
	public function accepteDix($int){
		
		if (!is_int($int)){
			throw new InvalidArgumentException($int . " n'est pas un nombre entier");
		}
		if (11 == $int){
			throw new MonException();
		}
		if ($int != 10){

			// Jeter une exception c'est lancer une erreur
			throw new Exception($int .' ne veut pas 10');
		}
		
		// la ligne suivante ne sera pas executé si l'exception a été jeté
		echo 'Ici <br/>';
	}
}

// $pdo = new PDO();

$demo = new Demo();
try {
	// Si une exception est jetée à l'intérieur du Try, alors on rentre dans le catch
	
	// $pdo->beginTransaction();
	$demo->accepteDix(11);
	
	// Si une exception a été jetée la suite du code du bloc try n'est pas executée
	// $pdo->commit;
	echo "La";
} catch (MonException $me) {
	echo "Mon exception : ";
	echo $me->getMessage();
} catch (InvalidArgumentException $iae) {
	echo "Argument invalide : ";
	echo $iae->getMessage();
} catch (Exception $e){
	// $pdo->rollback;
	echo "Je ne recois pas ce que je veux : ";
	echo $e->getMessage();
}







?>