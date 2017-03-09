<!DOCTYPE html>
<html>
    <head lang="fr">
        <meta charset="utf-8">
        <title>Test Assoconnect</title>
    </head>
    <body>
        <h1>Test Assoconnect</h1>
        <form method="post">
            <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname" value="">

            <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname" value="">

            <label for="email">Adresse d'email</label>
            <input type="email" id="email" name="email" value="">

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="">

            <label for="gender">Sexe</label>
            <select id="gender" name="gender">
                <option value="f">Femme</option>
                <option value="h">Homme</option>
            </select>

            <label for="birthday">Date de naissance</label>
            <input type="date" id="birthday" name="birthday" value="">

            <label for="tel">Numéro de téléphone</label>
            <input type="number" id="tel" name="tel" value="">
            <br />
            <label for="address">Adresse postale</label>
            <textarea name="address" id="address" rows="8" cols="80"></textarea>

            <input type="submit" value="Envoyer">
        </form>
        <div id="formulaire">
            <!-- AFficher le message de succès ou d'erreur d'ajax -->
        </div>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script type="text/javascript">

        $(function() {
            $('form').on('submit', function(event) {
                event.preventDefault();

                // console.log($(this).serialize());
                $.ajax ({
                    url: "register.php",
                    method: "post",
                    data: $(this).serialize(),


                    success: function () {

                        $('#formulaire').html('Merci pour votre inscription.');

                    },
                    error: function() {
                        var response = 'Erreur d\'ajax';
                        $('#formulaire').html(response);
                    }
                });
            });
        });
        </script>
    </body>
</html>
