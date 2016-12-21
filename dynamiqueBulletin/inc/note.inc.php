<form action="libs/services.php?action=addNote" method="post">
	<?php echo displaySelect('eleves','el_id','el_name'); ?>
	<?php echo displaySelect('matieres','ma_id','ma_name'); ?>
	<input type="text" name="note"/>
	<input type="submit"/>
</form>
