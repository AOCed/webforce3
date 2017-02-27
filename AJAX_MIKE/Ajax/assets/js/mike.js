	$(function () {
		$('#theForm').on('submit', function (e) { // Est appelé lorsque l'utilisateur souhaite soumettre le formulaire
		
			
			e.preventDefault(); // On empêche le navigateur de soumettre le formulaire
	 
			var $form = $(this); // $(this) = $('#theForm'); Le this defini l'élement en cours d'utilisation (ligne 166).
			
			// Vérification de l'explication. Les 2 variables renvoient les mêmes valeurs.
			console.log($form);
			console.info($('#theForm'));
			console.info(window.FormData);
			// Fin de la vérification
			
			/* Structure en ternaire.
				L’opérateur ternaire simplifie les if traditionnels. Elles sont plus optimisés et plus rapides à ecrire et à lire.
				
				ex : var mike = (travail == true)?300:0;
				
				---- elle se traduit en : ----
				if(travail == true)
					mike = 300;
				else
					mike = 0;
					
				---- ou avec les crochets : ----
				if(travail == true){
					mike = 300;
				}else{
					mike = 0;
				}
				
				---- En francais : ----
					Mike est payé 300€ si le travail est fait (Oui) sinon il n'est pas payé (donc webforce3 ne le paye jamais)
			*/
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
	 
			$.ajax({
				url: $form.attr('action'),
				type: $form.attr('method'),
				contentType: false, // obligatoire pour de l'upload. La Valeur par défaut est: "application / x-www-form-urlencoded"
				processData: false, // obligatoire pour de l'upload. Valeur booléenne. Indiquant si les données envoyées avec la requête doivent ou non être en chaîne de requêtes transformées. La valeur par défaut est true
				dataType: 'json', // selon le retour attendu
				data: data,
				success: function (response) {
					// La réponse du serveur
					$success = $('#success');
					$success.removeClass('hidden');
					
					// Affiche les données envoyés par la page php
					console.log(response)
				}
			});
		});
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// A chaque sélection de fichier
		$('#theForm').find('input[name="image"]').on('change', function (e) {
			var files = $(this)[0].files;
	 
			if (files.length > 0) {
				// On part du principe qu'il n'y a qu'un seul fichier
				// étant donné que l'on a pas renseigné l'attribut "multiple"
				var file = files[0],
					$image_preview = $('#image_preview');
	 
				// Ici on injecte les informations recoltées sur le fichier pour l'utilisateur
				$image_preview.find('.thumbnail').removeClass('hidden');
				$image_preview.find('img').attr('src', window.URL.createObjectURL(file));
				$image_preview.find('h4').html(file.name);
				$image_preview.find('.caption p:first').html(file.size +' bytes');
			}
		});
	 
		// Bouton "Annuler" pour vider le champ d'upload
		$('#image_preview').find('button[type="button"]').on('click', function (e) {
			e.preventDefault();
	 
			$('#theForm').find('input[name="image"]').val('');
			$('#image_preview').find('.thumbnail').addClass('hidden');
		});
	});