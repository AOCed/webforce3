	$(function () {
		$('#theForm').on('submit', function (e) { // Est appel� lorsque l'utilisateur souhaite soumettre le formulaire
		
			
			e.preventDefault(); // On emp�che le navigateur de soumettre le formulaire
	 
			var $form = $(this); // $(this) = $('#theForm'); Le this defini l'�lement en cours d'utilisation (ligne 166).
			
			// V�rification de l'explication. Les 2 variables renvoient les m�mes valeurs.
			console.log($form);
			console.info($('#theForm'));
			console.info(window.FormData);
			// Fin de la v�rification
			
			/* Structure en ternaire.
				L�op�rateur ternaire simplifie les if traditionnels. Elles sont plus optimis�s et plus rapides � ecrire et � lire.
				
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
					Mike est pay� 300� si le travail est fait (Oui) sinon il n'est pas pay� (donc webforce3 ne le paye jamais)
			*/
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			var data = (formdata !== null) ? formdata : $form.serialize();
	 
			$.ajax({
				url: $form.attr('action'),
				type: $form.attr('method'),
				contentType: false, // obligatoire pour de l'upload. La Valeur par d�faut est: "application / x-www-form-urlencoded"
				processData: false, // obligatoire pour de l'upload. Valeur bool�enne. Indiquant si les donn�es envoy�es avec la requ�te doivent ou non �tre en cha�ne de requ�tes transform�es. La valeur par d�faut est true
				dataType: 'json', // selon le retour attendu
				data: data,
				success: function (response) {
					// La r�ponse du serveur
					$success = $('#success');
					$success.removeClass('hidden');
					
					// Affiche les donn�es envoy�s par la page php
					console.log(response)
				}
			});
		});
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		// A chaque s�lection de fichier
		$('#theForm').find('input[name="image"]').on('change', function (e) {
			var files = $(this)[0].files;
	 
			if (files.length > 0) {
				// On part du principe qu'il n'y a qu'un seul fichier
				// �tant donn� que l'on a pas renseign� l'attribut "multiple"
				var file = files[0],
					$image_preview = $('#image_preview');
	 
				// Ici on injecte les informations recolt�es sur le fichier pour l'utilisateur
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