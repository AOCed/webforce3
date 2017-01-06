<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>scrolling infini</title>
        <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    </head>
    <body>
        <header>
            <h1>scrolling infini</h1>
        </header>
        <section class="scrolling">
            <h2>Section start !</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                dolor in hendrerit in vulputate velit esse molestie consequat,
                vel illum dolore eu feugiat nulla facilisis at vero eros et
                accumsan et iusto odio dignissim qui blandit praesent luptatum
                zzril delenit augue duis dolore te feugait nulla facilisi.
                Nam liber tempor cum soluta nobis eleifend option congue
                nihil imperdiet doming id quod mazim placerat facer possim
                assum. Typi non habent claritatem insitam; est usus legentis
                in iis qui facit eorum claritatem. Investigationes
                demonstraverunt lectores legere me lius quod ii legunt saepius.
                Claritas est etiam processus dynamicus, qui sequitur mutationem
                consuetudium lectorum. Mirum est notare quam littera gothica,
                quam nunc putamus parum claram, anteposuerit litterarum formas
                humanitatis per seacula quarta decima et quinta decima. Eodem
                modo typi, qui nunc nobis videntur parum clari, fiant sollemnes
                in futurum.
            </p>
        </section>
        <footer>
            <div class="bouton3">Voir plus de contenu</div>
        </footer>
        <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  
      <script type="text/javascript">

      var idSection = 0; // Mémoriser l'id de la section à charger
      var compteurAjax = 0; // Mémoriser le nombre de requete ajax
      // var testAjaxEnCours = false; // Pour que ajax fasse la requete un par un 
      var chargeSection = function(){

                // On attend la fin du chargeur
                // if (testAjaxEnCours) return;

                // Vérifier si le compteur n'a pas dépassé un seuil maximum 
                if (compteurAjax > 2) return;

                // testAjexEnCours = true;
                // On ajoute un au compteur
                compteurAjax = compteurAjax+1;
                // Le code sera activé quand on va cliquer sur .bouton
                // Avec ajax, on va charger toute la section et on ajoute la section avant la balise footer
                // http://api.jquery.com/jQuery.post/
                $.post("libs/services.php", { action: "getSection", idSection: idSection++ }, 
                    function(data){
                    // Ce code sera activé quand la réponse du serveur sera reçue
                    // Paramètre Data contiendra la réponse du serveur
                    // Ensuite, insérer la réponse dans la page avant la balise footer
                    $("footer").before(data);

                    // Autoriser une nouvelle requete Ajax
                    // testAjaxEnCours = false;
                    
                })
            };
        var chargerSectionBouton = function(){
            // Remettre le compteur à zero
            compteurAjax = 0;
            // relancer le chargement ajax
            chargeSection();
        }

        // ON VEUT AJOUTER NOTRE CODE AVEC jQuery
        $(function(){
            // MON CODE SERA ACTIVE QUAND LA PAGE SERA PRETE
            
            // QUAND ON CLIQUE SUR .bouton3
            // ALORS ON VA charger du contenu supplémentaire
            $(".bouton3").on("click", chargerSectionBouton) // Je peux ajouter mouseover après click si je veux que ca charge automatique qu and le souris est dessus

            // Faut suivre le scroll de la fenetre pour savoir si on est en bas de la page
            // On ajoute un listener sur le scroll de la fenetre
            $(window).on("scroll", function(){
                // Position en pixels du scroll
                var positionScroll = $(window).scrollTop();
                var hauteurPage = $(document).height();
                var hauteurFenetre = $(window).height();

                var pourcentageScroll = Math.round(100 * positionScroll / (hauteurPage - hauteurFenetre));
                // console.log(pourcentageScroll);
                // Si le pourcentage de scroll est supérieur à 90%
                if(pourcentageScroll > 99) {
                    chargeSection();
                }
            })

        });
              </script>
  
    </body>
</html>