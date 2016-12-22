<?php 

	$sql = "SELECT * FROM list ORDER BY `list`.`dvd_year` DESC ";
	$req = $connection->query($sql);

	if(isset($_GET['dvd_id'])){
		$sql2 = "SELECT * FROM list WHERE dvd_id = ".$_GET['dvd_id'];
		$req2 = $connection->query($sql2);
		$datas = $req2->fetch();

?>
	<form action="libs/services.php?action=modify" method="post">
		<input type="hidden" name="id" value="<?php echo $datas['dvd_id'];?>">
		<input type="text" name="title" value="<?php echo $datas['dvd_title'];?>"/>
		<input type="text" name="story" value="<?php echo $datas['dvd_story'];?>"/>
		<input type="text" name="director" value="<?php echo $datas['dvd_director'];?>"/>
		<input type="text" name="actors" value="<?php echo $datas['dvd_actors'];?>"/>
		<input type="text" name="genre" value="<?php echo $datas['dvd_genre'];?>"/>
		<input type="text" name="year" value="<?php echo $datas['dvd_year'];?>"/>
		<input type="submit"/>
	</form>
	<table>
	<tr>
		<th>Title</th>
		<th id="story">Story</th>
		<th>Director</th>
		<th>Actors</th>
		<th>Genre</th>
		<th>Year</th>
		<th>Modify</th>
	</tr>
	<?php 


		while($datas = $req->fetch()){
			echo "<tr>";
			echo "<td>".$datas['dvd_title']."</td>";
			echo "<td id='story'>".$datas['dvd_story']."</td>";
			echo "<td>".$datas['dvd_director']."</td>";
			echo "<td>".$datas['dvd_actors']."</td>";
			echo "<td>".$datas['dvd_genre']."</td>";
			echo "<td>".$datas['dvd_year']."</td>";
			echo "<td><a href='index.php?page=8&dvd_id=".$datas['dvd_id']."' id=modify>Modify</a></td>";
			echo "</tr>";
		}
	?>
</table>
<?php } else {
?>
<table>
	<tr>
		<th>Title</th>
		<th id="story">Story</th>
		<th>Director</th>
		<th>Actors</th>
		<th>Genre</th>
		<th>Year</th>
		<th>Modify</th>
	</tr>
	<?php 
		while($datas = $req->fetch()){
			echo "<tr>";
			echo "<td>".$datas['dvd_title']."</td>";
			echo "<td id='story'>".$datas['dvd_story']."</td>";
			echo "<td>".$datas['dvd_director']."</td>";
			echo "<td>".$datas['dvd_actors']."</td>";
			echo "<td>".$datas['dvd_genre']."</td>";
			echo "<td>".$datas['dvd_year']."</td>";
			echo "<td><a href='index.php?page=8&dvd_id=".$datas['dvd_id']."' id=modify>Modify</a></td>";
			echo "</tr>";
		}
	}
	?>
</table>