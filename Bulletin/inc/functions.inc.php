<?php 
	require_once('init.inc.php');

	function showScore($pSub, $pStuId){
		global $connection;

		$sql = "SELECT subjects.sub_name, students.stu_fullname, score
			FROM scores
			INNER JOIN students ON scores.stu_id = students.stu_id 
			INNER JOIN subjects ON scores.sub_id = subjects.sub_id
			where scores.stu_id = $pStuId AND scores.sub_id = $pSub";

		$req = $connection->prepare($sql);
		$req->execute();
		$data = $req->fetch();

		return $data['score'];
	}

	function calculAverage($pStuId){
		global $connection;

		$sql = "SELECT subjects.sub_name, students.stu_fullname, score
			FROM scores
			INNER JOIN students ON scores.stu_id = students.stu_id 
			INNER JOIN subjects ON scores.sub_id = subjects.sub_id
			where scores.stu_id = $pStuId";

		$req = $connection->prepare($sql);
		$req->execute();
		$data = $req->fetchAll();

/*		echo "<pre>";
		print_r($data);
		echo "</pre>";*/


		$notes = array();

		foreach ($data as $key => $value) {

/*			var_dump($notes['totalScore']);
			die();*/

			if(isset($notes['totalScore'])){


				$notes['totalScore'] += $data[$key]['score'];
				$notes['nbScore'] += 1;
			}else {
				$notes['totalScore'] = $data[$key]['score'];
				$notes['nbScore'] = 1;
			}

		}
		
		if (isset($notes['nbScore'])) {
			$average = $notes['totalScore']/$notes['nbScore'];
			return $average;
			} else {
				return "-";
		}

	}



	
?>