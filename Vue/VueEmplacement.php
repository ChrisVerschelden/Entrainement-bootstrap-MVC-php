<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <link rel="stylesheet" href="include/bootstrap.min.css">
    <link rel="stylesheet" href="include/styles.css">
	<title>Projet PWS !</title>
</head>
<body>
	<?php include("./include/header.php"); ?>
    <?php include("./include/menus.php"); ?>
    
    <?php
        echo '<br><br>';
        echo '<center>';
        echo '<table border="2">';
        echo '<tr><th>id Emplacement </th><td>' . $vEmplacement->idEmplacement. '</td><br>';
		echo '<tr><th>id Type </th><td>' . $vEmplacement->idType. '</td><br>';
		echo '<tr><th>nom Emplacement </th><td>' . $vEmplacement->adrEmplacement. '</td><br>';
        echo '<tr><th>année de Constrution </th><td>' . $vEmplacement->dateConstruction. '</td><br>';
        echo '<tr><th>image emplacement </th><td><img src= "./Vue/images/empl'. $vEmplacement->idEmplacement .'.jpg" height="60" ></td>';
        echo '</table>';
        echo '<br>';
        echo "<FORM> <INPUT TYPE='button'";
        echo "VALUE='Retour' onClick='history.back()'>";
        echo "</FORM>";
        echo "</center>";
    ?>

	<?php include("./include/footer.php"); ?>
</body>
</html>