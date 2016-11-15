// window.onload = function() {
// 	var conteneur = document.getElementsByClassName('conteneur');
// 	var toggle = false;
// 	// console.log(conteneur);

// 	function onOff(paramThis) {

// 		if (toggle === false) {
// 			paramThis.style.backgroundColor = "#00f";
// 			paramThis.style.width = 200+"px";
// 			toggle = true;
// 		} else {
// 			paramThis.style.backgroundColor = "#f00";
// 			paramThis.style.width = 400+"px";
// 			toggle = false;
// 		}
// 	}

// 	function addEvent() {
// 		for (var i=0; i<conteneur.length; i++) {
// 			conteneur[i].addEventListener('click', function() {
// 				console.log(this);
// 				onOff(this);
// 			});
// 		}
// 	}

// 	addEvent(); 
// }


window.onload = function() {
/*	var cube = document.getElementById('conteneur');
	var btn = document.getElementById('link');


	function anim() {
		var step = 4;
		var time = setInterval(function(){

			if (step < 93) {
				step++;
			} else {
				clearInterval(time);
			}
			cube.style.left = step+"%";
		}, 100);
	}

	btn.addEventListener('click', function(event) {
		event.preventDefault();
		anim();
	});
*/



	var form = document.getElementById('form');

	function verifMail (pChaine) {

		if (pChaine !== "") {
			var tab01 = pChaine.split('@');
			if (tab01.length === 2) {
				var tab02 = tab01[1].split('.');
				if (tab02.length > 1) {
					// console.log(tab02, tab02.length); 
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
			// console.log(tab01, tab01.length);
		} else{
			return false;
		}
	}


	form.addEventListener('submit', function(event){
		event.preventDefault();
		if(verifMail(this.children[0].value)) {
			alert ("Merci pour votre inscription !");
		} else {
			alert("Merci d'entrer un email addresse !");
		}
	});
}


