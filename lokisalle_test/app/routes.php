<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/salle', 'Salle#salle', 'default_salle'],
		['GET|POST', '/salleEdit/[i:id]', 'Salle#salleEdit', 'salle3'],
		['GET|POST', '/salleDelete/[i:id]', 'Salle#salleDelete', 'salle2'],
		['GET|POST', '/salle/plan', 'Default#plan', 'default_plan']
	);