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

	function search ($pQuery) {
		global $connection;
		
		$pQuery = explode(' ', $pQuery);

		$cCnt = count($pQuery);
		$regex = "";

		for ($i=0; $i < $cCnt; $i++) { 
			if($pQuery[$i] != ''){
				if ($i==0) {
					$regex .= $pQuery[$i];
				} else {
					$regex .= '|'.$pQuery[$i];
				}
			}
		}

		$regex = trim($regex, '|');

		$data = array('regex' => $regex);

		$sql = "SELECT * from articles WHERE ar_text REGEXP :regex";
		$req = $connection->prepare($sql);
		$req->execute($data);

		return $req->fetchAll();
	}

?>