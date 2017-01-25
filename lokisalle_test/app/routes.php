<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/salle/', 'Salle#salle', 'default_salle'],
		['GET|POST', '/salle/plan/', 'Default#plan', 'default_plan']
	);