<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="Pragma" content="no-cache" />
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
	<title>Projet PWS !</title>
</head>
<body>
	<?php include("./include/header.php"); ?>

    <?php include("./include/menus.php"); ?>
		<?php
			// s'il y a des étudiants à afficher
            if ($vListeEmplacement != NULL) {	
				echo "<br><br>";
				echo ' <table border="2">';
				echo '<tbody>';
				echo '<tr><th>id Emplacement</th><th>id Type</th><th>nom Emplacement</th><th>année de construction</th><th>images</th><th>modifier</th><th>supprimer</th></tr>';
				echo '</tbody>';
				foreach ($vListeEmplacement as $vEmplacement) { 
					// on génère une URL dynamique afin de pouvoir visualiser le  
					//  détail d'un emplacement
					 echo '<tr><td><a href="index.php?route=emplacementRead&id='.$vEmplacement->idEmplacement.'">'.$vEmplacement->idEmplacement.'</a></td>';
					 echo '<td>'.$vEmplacement->idType.'</td><td>'.$vEmplacement->adrEmplacement.'</td><td>'.$vEmplacement->dateConstruction.'</td>';
					 echo '<td> <a href="index.php?route=emplacementRead&id='.$vEmplacement->idEmplacement.'"> <img src= "./Vue/images/empl'. $vEmplacement->idEmplacement .'.jpg" height="60" > <a/> </td>';
					 echo '<td> <a href="index.php?route=emplacementUpdate&id='.$vEmplacement->idEmplacement.'"> <img src= "./Vue/images/modifier.jpg" height="60" > <a/> </td>';
					 echo '<td> <a href="index.php?route=emplacementDelete&id='.$vEmplacement->idEmplacement.'"> <img src= "./Vue/images/supprimer.jpg" height="60" ></td> </tr>';
				}
				echo "</table>";
				echo '<br>';
				echo '<center>';
				echo '<a href="index.php?route=emplacementCreate"><img src= "./Vue/images/ajouter.jpg" height="60" >';
				echo '</FORM>';
				echo '</center>';
			}
			else {
				echo "Pas d'emplacement...<BR>";
			}
        ?>

	<?php include("./include/footer.php"); ?>
</body>
</html>



