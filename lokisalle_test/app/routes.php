<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'default_home'],
		['GET|POST', '/gestion/', 'Default#gestion', 'default_gestion'],
		['GET|POST', '/gestion/plan/', 'Default#plan', 'default_plan']
	);