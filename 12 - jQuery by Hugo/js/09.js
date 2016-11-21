/*

OBJECTIF : A partir d'une liste de contacts, être en mesure de récupérer un contact et d'afficher le détail de ses informations.

CONSIGNEZ :

    ETAPE 1. Mettre en Place le HTML et le CSS nécessaire pour rechercher un contact.
        Ex. Un champ input-text, et/ou un bouton pour lancer la recherche.
        
    ETAPE 2. Récupérer le Flux JSON : https://jsonplaceholder.typicode.com/users et être en mesure de récupérer la fiche d'un utilisateur par rapport a son username.
    
    ETAPE 3. Afficher en HTML et CSS dans un premier temps, uniquement les informations de base : Nom, Prénom, Email, Téléphone.
    
    Puis, rajouter un lien : Lire la Suite qui affichera grâce a une animation .slideDown(), la suite de la fiche.
    
    ETAPE 4. Pour la suite de la fiche, vous afficherez l'adresse du contact et vous intégrerez Google Maps afin d'afficher sur la carte son adresse.
    
    ETAPE 5. BONUS : Vous privilegeriez l'utilisation de typehead.js pour votre champ input de recherche.
    
    ETAPE 6. BONUS : Grâce a l'utilisation des WebStorage, notamment sessionStorage vous afficherez la fiche d'un contact sur une page fiche.html
    
*/


/* ETAPE 2. Récupérer le Flux JSON : https://jsonplaceholder.typicode.com/users et être en mesure de récupérer la fiche d'un utilisateur par rapport a son username. */

// -- Les Flémards.js
l = function(d) {
    console.log(d);
}

var compteur_global = 0;

function lookup(compteur) {
    if(compteur == compteur_global) {
        recherche();
    }
}

// -- Chargement du DOM ...
$(function() {
    
    // -- Fonction enclenché a chaque modification de texte sur le champ#search
    compteur = function() {
        compteur_global++;
        $('.resultat').slideUp();
        setTimeout("lookup("+compteur_global+")", 1000);
    }
    
    // -- Définition de ma fonction recherche
    recherche = function() {
        // -- Vérification du fonctionnement
            //l($('#search').val())
        
        // -- Récupération de mes contacts en JSON
        $.getJSON('https://jsonplaceholder.typicode.com/users', function(membres) {
            
            // -- Vérification des informations retournées :    
                //l(membres)
            
            // -- 1ère possibilité : La Boucle FOR
            /*
                for(i = 0 ; i < membres.length ; i++) {
                    // -- Vérification
                        //l(membres[i].username)

                    // -- Je souhaite vérifier si un username correspond à une valeur string.
                    if( (membres[i].username == $('#search').val()) || (membres[i].email == $('#search').val()) || (membres[i].phone == $('#search').val()) ) {
                        // -- Vérification
                            l(membres[i].username + ' a ete trouve')
                    }
                }
            */
            
            // -- 2ème possibilité : L'utilisation de $.grep
                
                // -- Si la saisie de mon utilisateur n'est pas vide, je peu enclencher la recherche.
                if($('#search').val() != "") {
                    
                    // -- Utilisation de RegExp : https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/RegExp
                    
                    // -- Définition de mon Expression
                    var regex = new RegExp($('#search').val(), 'i');
                    
                    var membresfiltre = $.grep(membres, function(membre) {
                        // -- Vérification
                            //return membre; 
                        
                        // -- Ici, je filtre avec des valeurs strictement identique ou la casse a son importance.
                        //return membre.username == $('#search').val() || membre.email == $('#search').val();
                        
                        return regex.test(membre.username) || regex.test(membre.email) || regex.test(membre.phone) || regex.test(membre.name)
                        
                    });
                    
                } // -- END IF : Recherche #search=""
            
            // -- Je vide mes résultats, avant d'afficher les nouveaux. De cette façon j'évite d'additionner toutes mes recherches.
            $('.resultat').empty();
            
            // -- Vérification
                //l(membresfiltre)
            
            // -- Ma requete a été filtré, je souhaite afficher les résultats des membres trouvés.
            $.each(membresfiltre, function(indice, membre) {
               
                // -- Vérification
                    //l(membre);
                
                // -- Création de mes éléments
                var divmembre = $("<div class='membre'>");
                var divmembreinformations = $("<div class='membre_informations'>");
                var divdetailmembre = $("<div class='detail-membre'>");
                
                // -- Remplissage des informations du membre en cours
                divmembreinformations.html("<p>Nom Complet : "+membre.name+"</p><p>Username : "+membre.username+"</p><p>Email : "+membre.email+"</p><p>Téléphone : "+membre.phone+"</p>");
                
                // -- Création du lien Lire la Suite & Fermer
                var a = $("<a class='fermer' id='o-"+membre.id+"' href='javascript:void(0)'>Voir la Carte</a>");
                // --
                var aclose = $("<a class='ouvert' id='c-"+membre.id+"' href='javascript:void(0)'>Fermer</a>");
                
                gmap = $('<iframe width="100%" height="210" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA3Wr7D4AqrBfbwmo6Yr-cIwKO7VnJTuco&q='+membre.address.geo.lat+','+membre.address.geo.lng+'" allowfullscreen></iframe>');
                
                /* Envoi des informations pour affichage */ divmembre.append(divmembreinformations);
                divmembre.append(a);
                
                divdetailmembre.hide();
                divdetailmembre.append(gmap);
                divdetailmembre.append(aclose);
                
                divmembre.append(divdetailmembre);
                
                // -- Insertion dans la DIV RESULTAT
                divmembre.appendTo($('.resultat'));
                
                // --
                
                $('#o-'+membre.id).on('click', function(e) {
                    
                    // -- Apparition du bouton fermer
                    $(e.target).next().children().eq(1).fadeIn();
                    
                    // -- Faire apparaitre la div.detailmembre et modifier avec une animation sa hauteur.
                    $(e.target).next().fadeIn().animate({
                        height:250
                    });
                    // -- Je cache le bouton Afficher la Carte
                    $(e.target).fadeOut();
                });
                
                $('#c-'+membre.id).on('click', function(e) {
                    
                    // --
                    $(e.target).parent().animate({
                       height:0 
                    });
                    
                    // -- Je fait réapparaitre mon lien Voir la Carte
                    $(e.target).fadeOut().parent().prev().fadeIn();
                    
                });
                
            }); // -- Fin EACH : membresfiltre
            
            // --
            $('.resultat').slideDown();
            
        }); // -- Fin getJSON
    }
    
    // -- Lors de la saisie de texte par mon utilisateur dans le champ input#search, la fonction recherche sera executée.
    $('#search').on('input', compteur);
    
});
























