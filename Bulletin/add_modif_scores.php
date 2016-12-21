<?php 
require_once('./inc/init.inc.php');


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<form action="libs/services.php?action=<?php echo $actionName;?>" method="post">
	<input type="hidden" required="required" name="subId" value="<?php echo $data['sub_id']; ?>" />
	<label for="student">Nom d'élève</label>
	<select name="student">
		<option value="<?php echo $data['stu_id']; ?>">Thomas Mion </option>
		<option value="<?php echo $data['stu_id']; ?>">Andrei Gache</option>
		<option value="<?php echo $data['stu_id']; ?>">Thibaud Molitor</option>
		<option value="<?php echo $data['stu_id']; ?>">Eramban</option>
	</select>

	<label for="subject">Matière</label>
	<select name="subject">
		<option value="<?php echo $data['sub_id']; ?>">html </option>
		<option value="<?php echo $data['sub_id']; ?>">css</option>
		<option value="<?php echo $data['sub_id']; ?>">javascript</option>
		<option value="<?php echo $data['sub_id']; ?>">php</option>
		<option value="<?php echo $data['sub_id']; ?>">mysql</option>
	</select>

	<label for="score">Note</label>
	<input type="text" name="score" value="<?php echo $data['score']; ?>" />

	<input type="submit" value="Modifier">

</form>
	
</body>
</html>