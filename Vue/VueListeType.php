<!-- VueListeGroupes.php -->
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
    <br>
    <br>
    <table border="2">
        <tbody>
          <tr><th>Id Type</th><th>Nom Type</th><th>Modifier</th><th>Supprimer</th></tr>
        </tbody>
        <?php
            foreach ($vListeType as $vType) {               
                 echo '<tr><td><a href="index.php?route=typeRead&id='.$vType->idType.'">'.$vType->idType.'</a></td>';
                 echo '<td>'.$vType->nomType.'</td>';
                 echo '<td><a href="index.php?route=typeUpdate&id='.$vType->idType.'"><img src= "./Vue/images/modifier.jpg" height="60" ></td>';
                 echo '<td><a href="index.php?route=typeDelete&id='.$vType->idType.'"><img src= "./Vue/images/supprimer.jpg" height="60" ></td>';
            }
            echo '</table>';
        ?>
    
    <br>
    <center>
    <a href="index.php?route=typeCreate"><img src= "./Vue/images/ajouter.jpg" height="60" >
    </FORM>
    </center>

	<?php include("./include/footer.php"); ?>
</body>
</html>



