<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>	LOKISALLE </title>
    	
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
         href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    </head>

<body>

	<main>
	<!-- MENU DU HAUT, accueil, qui sommes nous, contact, espace membre -->

	<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">LOKISALLE</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <nav role="navigation">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Qui Sommes-Nous <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Contact</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Espace Membre <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Inscription</a></li>
                <li><a href="#">Connexion </a></li>
                <li><a href="#">Profil </a></li>
              </ul>
            </li>
          </ul>
        </nav><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </nav>

    <div class="container-fluid">
        <div class="row">
        <div class="col-md-2">

            <!-- CATEGORIE -->

    		<h2>Catégorie</h2>
    		<ul class="nav nav-pills nav-stacked">
        		  <li class="presentation" class="active"><a href="#">Réunion</a></li>
        		  <li class="presentation"><a href="#">Bureau</a></li>
        		  <li class="presentation"><a href="#">Formation</a></li>
    		</ul>

            <!-- VILLE -->
    		<h2>Ville</h2>

    		<ul class="nav nav-pills nav-stacked">
    		  <li class="presentation" class="active"><a href="#">Paris</a></li>
    		  <li class="presentation"><a href="#">Marseille</a></li>
    		  <li class="presentation"><a href="#">Lyon</a></li>
    		</ul>
   
            <!-- CAPACITE -->
            <h2>Capacité</h2>
	        <div class="btn-group">
			  <select class="capacite"></select>
            </div> 

            <!-- PRIX -->
			<h2>Prix</h2>
            <div id="slider"></div> 
                <p>
                  <label for="amount">maximum 1000$:</label>
                  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>    

            <!-- PERIODE -->
            <h2>Période</h2>        
            <div class="periode">
                <div>
                    <label for="datepicker">Jour d'arrivée</label>          
                     <div class="datetimepicker" class="input-append date">
                      <input type="text" />
                      <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                      </span>
                    </div>
                </div>

                <div>
    <label for="datepicker">Jour de départ</label>        
     <div class="datetimepicker" class="input-append date">
      <input type="text" />
      <span class="add-on">
        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
      </span>
    </div>  
</div> 
            </div>
                           
        </div>           

            <div class="col-lg-10">            

                        <div class="col-lg-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                                        <img src="assets/img/salle1.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                                    </div>
                        </div>

                        <div class="col-lg-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                                        <img src="assets/img/salle2.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                                    </div>
                        </div>

                        <div class="col-lg-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                                        <img src="assets/img/salle3.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                                    </div>
                        </div>

                       <div class="col-lg-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                                        <img src="assets/img/salle4.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                                    </div>
                        </div>

                        <div class="col-lg-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                                        <img src="assets/img/salle5.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                                    </div>
                        </div>

                        <div class="col-lg-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                                        <img src="assets/img/salle6.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                                    </div>
                        </div>

                        <div class="col-lg-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                                        <img src="assets/img/salle7.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                                    </div>
                        </div>

                        <div class="col-lg-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                                        <img src="assets/img/salle8.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                                    </div>
                        </div>

                        <div class="col-lg-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                        <img src="assets/img/salle9.jpg" alt="">
                                        <div class="caption">
                                            <h4 class="pull-right">$24.99</h4>
                                            <h4><a href="#">First Product</a>
                                            </h4>
                                            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                                        </div>
                                        <div class="ratings">
                                            <p class="pull-right">15 reviews</p>
                                            <p>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                                <span class="glyphicon glyphicon-star"></span>
                                            </p>
                                        </div>
                            </div>
                        </div>

            </div>
        </div>
    </div>
	</main>


<footer>
    <div class="container-fluid">
    	<div class="row">
    	                <div class="col-sm-12">
    	                    <a href="#"> « mentions légales » </a>
    	                    <a href="#"> « Conditions générales de ventes ». </a>
    	                </div>
    	</div>
    </div>
</footer>


<!-- mon CDN JQuery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-bootstrap/0.5pre/assets/css/bootstrap.min.css"></script>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



<!-- CDN JQuery du mec qui a fait le slider -->
<!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

<!--  Date picker -->
     <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>
    <script type="text/javascript">
      $('.datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm:ss',
        language: 'En'
      });
    </script>
  
<!-- MON JavaScript -->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>