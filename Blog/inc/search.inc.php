<?php 
	if(!empty($_GET['query'])){
		$result = search($_GET['query']); 
	} else {
		$result = false;
	}
?>

<form action="" method="get">
	<input type="hidden" name="page" value="search" />
	<input type="search" name="query" />
	<input type="submit" />
</form>


<div>
	<h1>Recherche</h1>
	<?php if($result) { ?>
			<p>Les mots que vous cherchez :<strong> <?php echo $_GET['query']; ?> </strong>apparaissent dans l'article ou les articles ci-dessous.</p>
		<?php foreach($result as $article) { ?>
		<h2><a href="?page=article&id=<?php echo $article['ar_id'];?>"><?php echo $article['ar_title']; ?></a></h2>
		<?php }; ?>
	<?php } ?>
</div>