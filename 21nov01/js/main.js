/* en Javascript on écrit de cette facon 
pour que javascript se lit après la chargement de la page */
/*
window.onload = function(){
	var monDiv = document.getElementById('monDiv');

	monDiv.style.height = 500+"px";
	monDiv.style.backgroundColor = '#0f0';
	monDiv.style.width = 400+"px";
	monDiv.style.marginTop  = 20+"px";

	var newDiv = document.createElement('div');
	newDiv.style.height = 100+"px";
	newDiv.style.backgroundColor = '#f00';
	newDiv.style.width = 100+"%";
	newDiv.style.marginTop  = 20+"px";
	// console.log(monDiv);

	monDiv.appendChild(newDiv);

	monDiv.children[0].addEventListener('mouseenter', function(){
		this.style.backgroundColor = '#0ff';
	});
};*/

/* en jQuery */
$(document).ready(function(){

	var monDiv = $('#monDiv');
	monDiv.css({"height":500, "width":400, "margin-top":20, "background-color":"#0f0"});

	var newDiv = $('<div/>')
	newDiv.css({"height":100, "width":"100%", "margin-top":20, "background-color":"#f00"});
	monDiv.append(newDiv);

/*	monDiv.children('div:eq(0)') la même facon qu'en bas, mais c'est moins rapide */
	monDiv.children().eq(0).on('mouseenter', function(){
		$(this).css({'background-color':"#0ff"});
	})

});

