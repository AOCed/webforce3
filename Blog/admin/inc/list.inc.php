<?php 
	$articles = get_articles();

	foreach ($articles as $article) {
		?>
		<div>
			<?php echo $article['ar_title'];?>
			<a href="?page=edit&id=<?php echo $article['ar_id']?>" id="modifArticle">Modifier</a>
		</div>
		<?php
	}
?>