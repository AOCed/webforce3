<?php 

	// Declaration de la fonction ce que mon programme sait faire 
	function getChats() {
		global $connection;

		$data = array(
		
		);

		$sql = "SELECT * FROM chat ORDER BY chat_date DESC";
		$req = $connection->prepare($sql);
		$req->execute($data);

		// Message de retour
		// Lecture de ligne trouvees
		// Parcours de chaque ligne une par une 
		while($datas = $req->fetch()) {
			echo '<div class="chat"><p class="pseudo">'.$datas["chat_pseudo"].' : </p>'."<p class='message'>".$datas["chat_message"].'</p>';
			echo '<p class="date">'.$datas["chat_date"].'</div>';
		}
	}

?>