/* ---------------------
  DISPONIBILITE DU DOM
---------------------- */

// -- A partir du moment ou mon DOM c'est à dire l'ensemble de l'arborescence de ma page est totalement chargé, je peux commencer à utiser jQuery.

// -- Pour commencer a utiliser jQuery, je vais mettre l'ensemble de mon code dans une fonction.

// -- Cette fonction est appelé automatiquement par jQuery lorsque le DOM est entièrement défini.

// -- 3 Façons de faire : 

jQuery(document).ready(function() {
    // -- Ici, le DOM est entièrement chargé.
});

// -- 2ème possibilité

$(document).ready(function() {
    // -- Ici, le DOM est entièrement chargé.
});

// -- 3ème possibilité, sans le (document).ready
$(function() {
    // -- Ici, le DOM est entièrement chargé.
    alert('Hello World !');
    $('#TexteEnJQuery').html("Mon texte en jQuery");
    // En JS : document.getElementById('TexteEnJQuery').innerHTML = "Mon texte en JQ";
});













