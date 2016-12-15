<?php 
	$articles = get_articles();
?>
<section>
	<h1>Blog</h1>
	<?php foreach($articles as $article) { ?>
		<h2><a href="?page=article&id=<?php echo $article['ar_id'];?>"><?php echo $article['ar_title']; ?></a></h2>
	<?php }; ?>
</section>