/* ------------------------------
  LES SELECTEURS D'ENFANTS jQUERY
------------------------------ */

// -- Initialisation de jQUERY
$(function() {
    
    l = function(d) {
        console.log(d);
    }
    
    // -- Je souhaite sélectionner toutes mes divs ...
    l($('div'));
    
    // -- Je souhaite toutes les div dans ma classe "header"
    var header = $("div.header");
    
    // - Je souhaite connaitre tous les descendants direct de ".header"
    l(header.children()); // -- .children()
    
    // -- Je souhaite connaitre parmi mes descendants direct, uniquement les éléments "ul"
    l(header.children('ul'));
    
    // -- Je souhaite maintenant récupérer tous les éléments "li" de mes "ul"
    l(header.children('ul').find('li')); // -- find();
    
    // -- Je souhaite récupérer uniquement le 2ème éléments de mes "li"
    l(header.children('ul').find('li').eq(1)); // -- eq();
    
// -- LES VOISINS
    
    // -- Je souhaite connaitre le voisin immediat de "header"
    l(header.next()); // -- .next() || .prev()
    
    // -- Pour connaitre le voisin du voisin
    l(header.next().next()); 
    
// -- LES PARENTS
    
    l(header.parent()); // -- .parent()
    
});












