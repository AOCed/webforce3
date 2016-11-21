/* ---------------------
  LES SELECTEURS jQUERY
---------------------- */

// -- Format : $(selecteur)

// -- DOM READY !
$(function() {
    
    // -- Les Flémard.js
    
        function l(e) {
            console.log(e);
        }
    
    // -- Selectionner les balises SPAN :
    
        // -- Version Javascript
        console.log('SPAN via JS :');
        console.log(document.getElementsByTagName('span'));
    
        // -- Version jQuery
        console.log('SPAN via jQuery :');
        console.log($('span'));
    
    // -- Selectionner mon Menu
    
        // -- Version Javascript
        console.log('ID via JS :');
        console.log(document.getElementById('menu'));
    
        // -- Version jQuery
        console.log('ID via jQuery :');
        console.log($('#menu'));
    
    // -- Remarquez que jQuery me permet de sélectionner des éléments de façon beaucoup plus simple que Javascript.
    
    // -- Selectionner une Classe
    
        // -- Version Javascript
        l('CLASSE via JS :');
        l(document.getElementsByClassName('MaClasse'));
    
        // -- Version jQuery
        l('CLASSE via jQuery :');
        l($('.MaClasse'));
    
    // -- Sélectionner par Attribut
        l('Par Attribut :');
        l($("[href='http://www.google.fr']"));
        // --
        l($("[href]"));
    
    /* -- A VOIR PAR VOUS MÊME :
    
        A. Les Sélecteurs d'Enfants*
        B. Les Sélecteurs de Filtre
        C. Les Sélecteurs de Visibilité
        D. Les Sélecteurs de Formulaires* -- */
    
});

















