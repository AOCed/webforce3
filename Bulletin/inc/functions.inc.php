<?php 
	require_once('init.inc.php');

	function displaySelect($tableName, $colValue, $colDisplay){
		global $connection;

		$sql = "SELECT * FROM ".$tableName;
		$req = $connection->prepare($sql);
		$req->execute();

		$html = "<select name='".$tableName."'>";
			while($data=$req->fetch()){
			$html .= '<option value="'.$data[$colValue].'">'.$data[$colDisplay].'</option>';
		
			}
		$html .= '</select>';
		return $html;
	}


	function showScore($studentId){
		global $connection;

		$sql = "SELECT * FROM students
			where students.stu_id = $studentId ";
			$req = $connection->prepare($sql);
		$req->execute();
		$data2 = $req->fetch();

		$sql = "SELECT
		  `subjects`.`sub_id`,
		  `subjects`.`sub_name`,
		  TRUNCATE(Avg(scores.score),2) AS avgSubject
		FROM
		  `subjects`
		  LEFT JOIN `scores` ON `subjects`.`sub_id` = `scores`.`sub_id` AND 
		  `scores`.`stu_id`= $studentId
		GROUP BY
		  `subjects`.`sub_id`";

		$req = $connection->prepare($sql);
		$req->execute();


		$html = "<p>< Détail des notes moyennes de chaque matière de votre élève ></p><span><strong>".$data2['stu_fullname'];
			while($data=$req->fetch()){
			$html .= "</strong> | ".$data['sub_name']." </span><span> ".$data['avgSubject'].'</span>';
			}
		return $html;

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
			$average = round($notes['totalScore']/$notes['nbScore'],2);
			return $average;
			} else {
				return "-";
		}

	}



	
?>