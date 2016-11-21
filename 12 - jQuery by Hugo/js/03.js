/* ------------------------------
  LE CHAINAGE DE METHODES jQUERY
------------------------------ */

// -- Si je souhaite sélectionner toutes les DIV de ma page HTML ?

$(function() {
    // -- Je souhaite cacher toutes les div de ma page.
   $('div').hide('slow', function() {
       
       // -- Une fois que la méthode hide() est terminée, mon alerte peux s'executer.
       
       // -- Je peu executer une fonction, après une autre fonction.
       
       // -- NOTA BENE : La fonction s'executera pour l'ensemble des éléments du selecteurs.
            
       // -- Réapparition magique :
       $('div').show('slow', function() {
          
           // -- Ici, va s'executer le code après que mes DIV soit réapparu.
           
           $('div').css('background','yellow');
           $('div').css('color','red');
           
       });
   });
    
    // -- En utilisant le chainage, vous pouvez faire s'enchainer plusieurs fonctions les unes après les autres.
    
    $('p').hide(1000).css('color','blue').css('font-size','2em').delay(2000).show(600);
    
    // -- Certaine fonction peuvent prendre en paramètre un tableau d'objet, par exemple ici, il n'est pas nécessaire de répéter .css().css(), ... pour gagner du temps, nous pouvons écrire :
    
    $('p').hide(1000).css({'color':'blue','font-size':'2em'}).delay(2000).show(600);
    
});

// --




