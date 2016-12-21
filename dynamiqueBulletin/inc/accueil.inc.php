<?php
$sql = "
SELECT
  `eleves`.`el_name`,
  `eleves`.`el_firstname`,
  TRUNCATE(AVG(`notes`.`no_note`),2) AS `avgEleve`
FROM
  `eleves`
  LEFT JOIN `notes` ON `eleves`.`el_id` = `notes`.`fk_el_id`
GROUP BY
  `eleves`.`el_id`
ORDER BY
  `eleves`.`el_name`,
  `eleves`.`el_firstname`
";
$req = $connexion->query($sql);
?>
<table>
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Moyenne</th>
	</tr>
	<?php
		while($datas = $req->fetch()){
			echo "<tr>";
			echo "	<td>".$datas['el_name']."</td>";
			echo "	<td>".$datas['el_firstname']."</td>";
			echo "	<td>".$datas['avgEleve']."</td>";
			echo "</tr>";
		}
	?>
</table>