<div id="sidebar" class="sidebar-offcanvas">
    <div style="padding-top: 30px;" class="col-md-12">
        <ul class="nav nav-pills flex-column">
            
			<?php
				// on récupère le nom du script executé sans son chemin
				$page = pathinfo($_SERVER['PHP_SELF'], PATHINFO_BASENAME);
				// echo $page;
				echo '<li class="nav-item">';
				if ($page == 'index.php') {
					echo '<a class="nav-link active" href="index.php">Accueil</a>';
				}
				else {
					echo '<a class="nav-link" href="index.php">Accueil</a>';
				}
				echo '</li>';
				
				echo '<li class="nav-item">';
				if ($page == 'index.php?route=typeRead') {
					echo '<a class="nav-link active" href="index.php?route=typeRead">Consulter les emplacements par type</a>';
				}
				else {
					echo '<a class="nav-link" href="index.php?route=typeRead">Consulter les emplacements par type</a>';
				}
				echo '</li>';

                echo '<li class="nav-item">';
                if ($page == 'index.php?route=emplacementRead') {
                    echo '<a class="nav-link active" href="index.php?route=emplacementRead">Consulter tous les emplacements</a>';
                }
                else {
                    echo '<a class="nav-link" href="index.php?route=emplacementRead">Consulter tous les emplacements</a>';
                }
                echo '</li>';

                echo '<li class="nav-item">';
                if ($page == 'index.php?route=deconnexion') {
                    echo '<a class="nav-link active" href="index.php?route=deconnexion">Déconnexion</a>';
                }
                else {
                    echo '<a class="nav-link" href="index.php?route=deconnexion">Déconnexion</a>';
                }
                echo '</li>';

                if (isset($_COOKIE['monLogin'])) {
                    echo '<li class="nav-item">';
                    if ($page == 'index.php?route=destroyCookie') {
                        echo '<a class="nav-link active" href="index.php?route=destroyCookie">Détruire le cookie</a>';
                    } else {
                        echo '<a class="nav-link" href="index.php?route=supprimerCookie">Détruire le cookie</a>';
                    }
                    echo '</li>';
                }
                ?>
        </ul>
    </div>
</div>

