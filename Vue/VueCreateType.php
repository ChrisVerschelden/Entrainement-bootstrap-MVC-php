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
            if(isset($vListeType)){
                $lastId = 0;
                foreach($vListeType as $vType){
                    $lastId = $vType->idType;
                    $nomType = $vType->nomType;
                }
                echo '<br><br>';
                echo '<center>';
                echo '<form method="post" action="index.php?route=typeCreate">';
                echo "Id du type : <input type='text' name='idType' value='". $lastId ."'> <br><br>";
                echo "Nom du type : <input type='text' name='nomType' value='". $nomType ."'> <br><br>";
                if(isset($_GET['msgErr'])){
                    echo $_GET['msgErr'];
                    echo '<br>';
                }
                echo "<input type='submit' name='create' value='valider'>";
                echo '</form>';
                echo "</center>";
            } else {
                echo '<br><br>';
                echo '<center>';
                echo '<form method="post" action="index.php?route=typeUpdate&id='. $vType->idType .'">';
                echo "Id du type : <input type='text' name='idType' value='". $vType->idType ."' readonly> <br><br>";
                echo "Nom du type : <input type='text' name='nomType' value='". $vType->nomType ."'> <br><br>";
                if(isset($_GET['msgErr'])){
                    echo $_GET['msgErr'];
                    echo '<br>';
                }
                echo "<input type='submit' name='update' value='valider'>";
                echo '</form>';
                echo "</center>";
            }
        }else{
            if(isset($_POST['create'])){
                if(!preg_match('#^[4-9]0{2}$#',$_POST['idType']) || !preg_match('#^[a-z\s]{3,25}$#i',$_POST['nomType'])){
                    header("location:index.php?route=typeCreate&msgErr=Les informations saisies ne sont pas conformes");
                }else{
                    $modeleType = new modeleType();
                    $modeleType->createType();
                }
            }else{
                if(!preg_match('#^[4-9]0{2}$#',$_POST['idType']) || !preg_match('#^[a-z\s]{3,25}$#i',$_POST['nomType'])){
                    header("location:index.php?route=typeUpdate&id=".$_POST['idType']."&msgErr=Les informations saisies ne sont pas conformes");
                }else{
                    $modeleType = new modeleType();
                    $modeleType->updateType();
                }
            }
        }
    ?>

	<?php include("./include/footer.php"); ?>
</body>
</html>