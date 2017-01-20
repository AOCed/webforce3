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
		
		// la ligne suivante ne sera pas execut� si l'exception a �t� jet�
		echo 'Ici <br/>';
	}
}

// $pdo = new PDO();

$demo = new Demo();
try {
	// Si une exception est jet�e � l'int�rieur du Try, alors on rentre dans le catch
	
	// $pdo->beginTransaction();
	$demo->accepteDix(11);
	
	// Si une exception a �t� jet�e la suite du code du bloc try n'est pas execut�e
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