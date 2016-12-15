<?php 
	$articles = get_articles();
?>

<!-- Si j'ai toutes les infos pour récupérer un article (id) -->
<?php if (!empty($_GET['id'])) { ?>

	<!-- J'essaie de récupérer l'article correspondant -->
	<?php $article = get_article($_GET['id']); ?>
	<!-- Si j'ai pas réussi à récupérer l'article -->
	<?php if($article){ ?>
		<section>	
			<h1><?php echo $article['ar_title']; ?></h1>
			<p><?php echo $article['ar_text']; ?></p>
			<img src="<?php echo $article['ar_image']; ?>" alt="">
			<span><?php echo $article['ar_id_user']; ?> | </span>
			<span><?php echo $article['ar_date']; ?></span>
		</section>
	<?php } else { ?>
		<!-- Si l'id n'est pas valide ou qu'un article ne correspond -->
		<p>Cet article n'existe pas ou plus.</p>
	<?php } ?>
<?php } else { ?>
	<!-- Si je n'ai pas d'id spécifié -->
	<p>Cet article n'existe pas ou plus.</p>
<?php } ?>
