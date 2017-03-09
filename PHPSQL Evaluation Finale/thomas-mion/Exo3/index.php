<?php

require_once 'connect.php';

$queryCars = $db->prepare('SELECT * FROM cars ORDER BY brand, model, year');
if ($queryCars->execute()) {
	$cars = $queryCars->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Exercice 3</title>
	<meta charset="utf-8">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <style>
    .container {
        margin-top: 50px;
    }
    tr.newest {
        background: #97c0d7;

		font-weight: bold;
    }
    </style>
</head>
<body>

    <div class="container">

        <div class="row">

            <div class="col-md-7">

                <div id="carsList">

        			<table class="table">
        				<thead>
        					<tr>
        						<th>Marque</th>
        						<th>Modèle</th>
        						<th>Année</th>
        						<th>Couleur</th>
        					</tr>
        				</thead>
                        <?php foreach($cars as $car): ?>
    					<tr>
                            <td><?= $car['brand'] ?></td>
                            <td><?= $car['model'] ?></td>
                            <td><?= $car['year'] ?></td>
                            <td><?= $car['color'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>

                </div>

            </div>

            <div class="col-md-5">

    			<form method="post" class="form-horizontal well well-sm">
    			<fieldset>

        			<legend>Ajouter une voiture</legend>

        			<div class="form-group">
        				<label class="col-md-4 control-label" for="brand">Marque</label>
        				<div class="col-md-8">
        					<input id="brand" name="brand" type="text" class="form-control input-md" required>
        				</div>
        			</div>

        			<div class="form-group">
        				<label class="col-md-4 control-label" for="model">Modèle</label>
        				<div class="col-md-8">
        					<input id="model" name="model" type="text" class="form-control input-md" required>
        				</div>
        			</div>

        			<div class="form-group">
        				<label class="col-md-4 control-label" for="year">Année</label>
        				<div class="col-md-8">
    						<select id="year" name="year" class="form-control input-md" required>
    					    <?php for ($i = (date("Y") + 1) ; $i >= 1900 ; $i--): ?>
                                <option value="<?= $i ?>" <?php if ($i == date("Y")): ?>selected<?php endif; ?>><?= $i ?></option>
                            <?php endfor; ?>
    						</select>
        				</div>
        			</div>

        			<div class="form-group">
        				<label class="col-md-4 control-label" for="color">Couleur</label>
        				<div class="col-md-8">
        					<input id="color" name="color" type="text" class="form-control input-md" required>
        				</div>
        			</div>

    				<div class="form-group">
    					<div class="col-md-4 col-md-offset-4">
    						<button type="submit" class="btn btn-primary">Envoyer</button>
    					</div>
    				</div>

    			</fieldset>
    			</form>

    		</div>

        </div>

    </div>

<script type="text/javascript">
$(function() {
	$('form').on('submit', function(event) {
        event.preventDefault();

        console.log($(this).serialize());


        $.ajax ({
            url: "register.php",
            type: "POST",
            data: $(this).serialize(),

            success: function (response) {
                $('#carsList').html(response);
            },
            error: function() {
                var response = 'Une erreur est survenue';
                $('#carsList').html(response).fadeIn();
            }
        });
	});
});
</script>

</body>
</html>
