$(document).ready(function(){

	// EXERCICE: TROUVER LA BALISE LI A PARTIR DU ID PARENT 

	// Ce n'est pas bon puisque j'ai trouvé qu'à partir de ul en cas d'avoir 
	// plusieurs ul, cela ne donnera pas de bon résultat.
	var div02 = $("ul.sousmenu").children();
/*	console.log(div02);*/

	var child = $('#parent').find("li");
	var child2 = $('#parent li'); // cela prend plus de temps que var child
	var child3 = $('#parent').children('div:eq(1)').children().children();
	var child4 = $('#parent .enfant02 ul li');
	var child5 = $('#parent .enfant02 ul li:eq(4)'); // eq() cherche 4eme index
/*	console.log(child);
	console.log(child2);
	console.log(child3);
	console.log(child4);
	console.log(child5);*/

	var mesObjets = $('#parent').children('div:eq(0)').children();
	var monDiv = mesObjets.filter(function(){ return $(this)[0].nodeName === 'DIV'});
/*	console.log(monDiv);*/

	var mesLinks = $('#parent').find("a");
/*	console.log(mesLinks);*/

	mesLinks.on('click', function(event){
		event.preventDefault();
		console.log($(this).siblings('a'));
	});



});

