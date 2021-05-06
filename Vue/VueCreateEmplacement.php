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
        if(!isset($_POST['update']) && !isset($_POST['create']) || isset($_GET['msgErr'])){
            if(isset($vEmplacement)){
                echo '<br><br>';
                echo '<center>';
                echo '<table border="2">';
                echo '<form method="post" action="index.php?route=emplacementUpdate&id='. $vEmplacement->idEmplacement .'">';
                echo "<tr><th>id Emplacement </th><td><input type='text' name='idEmpl' value='" . $vEmplacement->idEmplacement . "' readonly></td><br>";
                echo '<tr><th>id Type </th><td>';
                echo "<select name='selectType'>";
                    foreach($vListeType as $vType){
                        if($vEmplacement->idType == $vType->idType){
                            echo "<option value='" . $vType->idType . "' selected>" . $vType->nomType . " </option>";
                        } else {
                            echo "<option value='" . $vType->idType . "'>" . $vType->nomType . " </option>";
                        }
                    }
                echo "</select>";
                echo '</td><br>';
                echo "<tr><th>nom Emplacement </th><td><input type='text' name='adrEmpl' value='" . $vEmplacement->adrEmplacement. "'></td><br>";
                echo "<tr><th>année de Constrution </th><td><input type='number' name='anneeConstruction' value='" . $vEmplacement->dateConstruction. "'></td><br>";
                echo '<tr><th>image emplacement </th><td><img src= "./Vue/images/empl'. $vEmplacement->idEmplacement .'.jpg" height="60" > <br> <input type="file" name="fichier"> </td>';
                echo '</table>';
                echo '<br>';
                if(isset($_GET['msgErr'])){
                    echo isset($_GET['msgErr']);
                }
                echo "<input type='submit' name='update' value='valider'>";
                echo '</form>';
                echo "</center>";
            } else {
                echo '<br><br>';
                echo '<center>';
                echo '<table border="2">';
                echo '<form method="post" action="index.php?route=emplacementCreate" enctype="multipart/form-data">';
                echo "<tr><th>id Emplacement </th><td> <input type='text' name='idEmpl' value='666'>  </td><br>";
                echo "<tr><th>id Type </th><td>";
                echo "<select name='selectType'>";
                    foreach($vListeType as $vType){
                        if($vEmplacement->idType == $vType->idType){
                            echo "<option value='" . $vType->idType . "' selected>" . $vType->nomType . " </option>";
                        } else {
                            echo "<option value='" . $vType->idType . "'>" . $vType->nomType . " </option>";
                        }
                    }
                echo "</select>";
                echo '</td><br>';
                echo "<tr><th>nom Emplacement </th><td> <input type='text' name='adrEmpl' value='3 rue des paquerêtes'> </td><br>";
                echo "<tr><th>année de Constrution </th><td> <input type='number' name='anneeConstruction' value='2077'> </td><br>";
                echo '<tr><th>image emplacement </th><td> <br> <input type="file" name="fichier"> </td>';
                echo '</table>';
                echo '<br>';
                echo "<input type='submit' name='create' value='valider'>";
                echo '</form>';
                echo "</center>";
            }
        }else{
            if(isset($_POST['create'])){
                if(isset($_FILES['fichier']) && $_FILES['fichier']['error']==0){
                    $infoFich = pathinfo($_FILES['fichier']['name']);
                    $ext_upload = $infoFich['extension'];
                    $ext_autorisees = array('jpg','png','gif','jpeg');
                    header("location:index.php?route=emplacementCreate&msgErr=image de merde");
                        move_uploaded_file($_FILES['fichier']['name'],'Vue/images/empl'.$_POST['idEmpl'].$ext_upload);
                    
                }else{
                    header("location:index.php?route=emplacementCreate&msgErr=image de merde");
                }
                $modeleEmplacement = new modeleEmplacement();
                $modeleEmplacement->createEmplacement();
            }elseif(isset($_POST['update'])){
                $modeleEmplacement = new modeleEmplacement();
                $modeleEmplacement->updateEmplacement();
            }
        }
    ?>
	<?php include("./include/footer.php"); ?>
</body>
</html>