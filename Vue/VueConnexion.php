<html>
    <head>
        <title>Projet PWS !</title>
    </head>
        <body>
            <?php
                if ( isset($error) ) { 
                    echo "<H2>".$error."</H2>"; 
                }
                if(!isset($login)){
                    $login = "";
                }
                echo '<form method="post" action="index.php">';
                echo "Login : <input type='text' name='login' value='". $login ."'></BR></BR>";
                echo 'Mot de passe : <input type="password" name="password" /></BR></BR>';
                echo "Se souvenir de moi : <input type='checkbox' name='souvenir'/></BR></BR>";
                echo "<input type='submit' name='Envoi' value='Entrer'/>";
                echo '</form>';
            ?>
        </body>
</html>