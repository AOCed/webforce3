<form action="libs/services.php?action=add" method="post">
	<input type="text" name="title" placeholder="title"/>
	<input type="text" name="story" placeholder="story"/>
	<input type="text" name="director" placeholder="director"/>
	<input type="text" name="actors" placeholder="actors"/>
	<input type="text" name="genre" placeholder="genre"/>
	<input type="text" name="year" placeholder="year"/>
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
	</tr>
	<?php
		$sql = "SELECT * FROM list ORDER BY `list`.`dvd_year` DESC";
		$req = $connection->query($sql);
		$datas = $req->fetch();

		while($datas = $req->fetch()){
			echo "<tr>";
			echo "	<td>".$datas['dvd_title']."</td>";
			echo "	<td id='story'>".$datas['dvd_story']."</td>";
			echo "	<td>".$datas['dvd_director']."</td>";
			echo "	<td>".$datas['dvd_actors']."</td>";
			echo "	<td>".$datas['dvd_genre']."</td>";
			echo "	<td>".$datas['dvd_year']."</td>";
			echo "</tr>";
		}
	?>
</table>
