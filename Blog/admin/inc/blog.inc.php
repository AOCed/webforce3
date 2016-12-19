<?php 
	$articles = get_articles();
?>
<section>
	<h1>Blog</h1>
	<?php foreach($articles as $article) { ?>
		<h2><?php echo $article['ar_title'];?></h2>
		<p><?php echo $article['ar_text'];?></p>
	<?php }; ?>
</section>