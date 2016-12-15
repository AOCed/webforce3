<?php 

	function get_articles(){
		global $connection;

		$sql = "SELECT * FROM articles ORDER BY ar_date DESC";
		$req = $connection->query($sql);
		$data = $req->fetchAll();
		return $data;
	}

	function get_article($pId){
		global $connection;
		
		settype($pId, 'integer');
		
		$data = array(
			"id"=>$pId);
		$sql = "SELECT * FROM articles WHERE ar_id=:id";
		$req = $connection->prepare($sql);
		$req->execute($data);

		$data = $req->fetch();

		return $data;
	}

?>