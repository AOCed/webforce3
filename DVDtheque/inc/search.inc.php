<?php 
	if(!empty($_GET['query'])){

		$result = search($_GET['query']); 

	} else {
		$result = false;
	}

	$sql = "SELECT * FROM list";
	$req = $connection->prepare($sql);
	$datas = $req->fetch();

?>

<form action="" method="get">
	<input type="hidden" name="page" value="9" />
	<input type="search" name="query" />
	<input type="submit" />
</form>
<div>
	<?php if($result) { ?>
			<p>Les mots que vous cherchez :<strong> <?php echo strtoupper($_GET['query']); ?> </strong>apparaissent dans la liste ou les listes ci-dessous.</p>
			<table>
			<tr>
			<th class="search">Title</th>
			<th class="search" id="story">Story</th>
			<th class="search">Director</th>
			<th class="search">Actors</th>
			<th class="search">Genre</th>
			<th class="search">Year</th>
			</tr>
		<?php foreach($result as $datas) { 
				echo "<tr>";
				echo "<td>".$datas['dvd_title']."</td>";
				echo "<td id='story'>".$datas['dvd_story']."</td>";
				echo "<td>".$datas['dvd_director']."</td>";
				echo "<td>".$datas['dvd_actors']."</td>";
				echo "<td>".$datas['dvd_genre']."</td>";
				echo "<td>".$datas['dvd_year']."</td>";
				echo "</tr>";
		?>
		 <!-- <h4><a href="index.php?page=9?id=<?php // echo $datas['dvd_id'];?>"><?php // echo $datas['dvd_title']; ?></a></h4> -->
		<?php }; ?>
	<?php } ?>
	</table>
</div>