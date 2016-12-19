<header>
	<nav>
		<ul> 
			<li><a href="?page=home">Home</a></li><!--  Si on veut logo avec lien à home, dans li ici -->
			<li><a href="?page=blog">Blog</a></li>

			<?php if (!empty($_SESSION['user'])){ ?>
				<li><a href="./libs/signup_services.php?action=logout">Deconnexion</a></li>
				<?php if($_SESSION['admin'] == 1) {?>
					<li><a href="admin">Admin</a></li>
				<?php } ?>
			<?php } else { ?>
				<li><a href="?page=signup">Sign Up</a></li>
				<li><a href="?page=login">Log In</a></li>
			<?php } ?>
				<li><a href="?page=search">Search</a></li>
				<li><a href="?page=contact">Contact</a></li>
		</ul>
	</nav>
</header>