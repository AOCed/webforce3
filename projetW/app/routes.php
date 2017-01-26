<?php
	
	$w_routes = array(
		['GET', '/', 'Default#home', 'home'], // Default est le nom du controlleur et #home la méthode
		['GET', '/test', 'Default#test', 'test'],
		['GET', '/contact', 'Contact#form', 'contact'],
		['POST', '/contact2', 'Contact#traitement', 'contact2']
			
	);