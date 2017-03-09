<?php 
	$articles = get_articles();
?> 
	<a href="?page=edit">Nouvel Article</a>
<?php
	foreach ($articles as $article) {
		?>
		<div>
			<p><?php echo $article['ar_title'];?></p>
			<a href="?page=edit&id=<?php echo $article['ar_id']?>" id="modifArticle"> | Modifier</a>
		</div>
		<?php
	}
?>