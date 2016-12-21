<?php
if(isset($_POST['eleves'])){
	$data = array('eleveId'=>$_POST['eleves']);
	$sql = "
		SELECT * FROM eleves WHERE el_id = :eleveId
	";
	$req = $connexion->prepare($sql);
	$req->execute($data);
	$datasEleve = $req->fetch();
	
	$sql = "
		SELECT
		  `matieres`.`ma_id`,
		  `matieres`.`ma_name`,
		  TRUNCATE(Avg(`notes`.`no_note`),2) AS avgMatiere
		FROM
		  `matieres`
		  LEFT JOIN `notes` ON `matieres`.`ma_id` = `notes`.`fk_ma_id`   AND 
		  `notes`.`fk_el_id`=:eleveId
		GROUP BY
		  `matieres`.`ma_id`
	";
	$req = $connexion->prepare($sql);
	
	$req->execute($data);
}
?>
<form action="" method="post">
<?php
	echo displaySelect('eleves','el_id','el_name');
?>
<input type="submit"/>
</form>
<?php if(isset($_POST['eleves'])){ ?>
<h2><?php echo $datasEleve['el_name']." ".$datasEleve['el_firstname']; ?> </h2>
<table>
	<tr>
		<th>Matière</th>
		<th>Moyenne</th>
		<th>Moyenne Classe</th>
		<th>note la plus haute</th>
		<th>note la plus basse</th>
	</tr>
	<?php
		while($datas = $req->fetch()){
			$temp = getResultsByMatiere($datas['ma_id']);
			echo "<tr>";
			echo "	<td>".$datas['ma_name']."</td>";
			echo "	<td>".$datas['avgMatiere']."</td>";
			echo "	<td>".$temp['noteAvg']."</td>";
			echo "	<td>".$temp['noteMax']."</td>";
			echo "	<td>".$temp['noteMin']."</td>";
			echo "</tr>";
		}
	?>
</table>
<?php } ?>

