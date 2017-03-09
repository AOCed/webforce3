<?php 
	if(!empty($_GET['id'])){
		$article = get_article($_GET['id']);

	} if (empty($article)|| !$article) {
		$article = array(
		"ar_id"=>"",
		"ar_title"=>"",
		"ar_text"=>"",
		"ar_image"=>"");

		$action = "postArticle";
	} else {
		$action = "editArticle";
	}
?>
<form action="../libs/admin_services.php?action=<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	
	<input type="hidden" name="id" value="<?php echo $article['ar_id']; ?>" />
	<input type="hidden" name="filepath" value="<?php echo $article['ar_image']; ?>" />
	<div>
		<label for="title">Titre</label>
		<input type="text" name="title" id="title" value="<?php echo $article['ar_title']; ?>" />
	</div>
	<div>
		<label for="text">Texte</label>
		<textarea name="text" id="text" /><?php echo $article['ar_text'];?></textarea>			
	</div>
	<div>
		<label for="image">Image</label>
		<input type="file" name="image" id="image" accept="image/*" /></input>			
	</div>
	<input type="submit" />
</form>

