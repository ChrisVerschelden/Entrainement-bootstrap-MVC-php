<?php 

class ControleurConnexion{

    public function connexion() {
        if(isset($_POST['Envoi'])) {

            if($_POST['login']=="Angela"  && $_POST['password']=="Merkel") {
                $_SESSION['acces'] = "oui";
                $_SESSION['nom'] = htmlentities($_POST['login']);
                if (isset($_POST['souvenir'])) {
                    setcookie("monLogin", $_POST['login'], time()+15*60);
                }
                header("location:index.php?route=default");
            } else {
                $error = "Erreur de connexion veuillez recommencer";
            }
        }
        require 'Vue/VueConnexion.php';
    }

    public function supprimerCookie() {
        unset($_COOKIE['monLogin']);
        setcookie('monLogin', time() - 15000);
        require 'Vue/VueAccueil.php';
    }

    public function deconnexion() {
        if (isset($_COOKIE['monLogin'])) {
            $login = $_SESSION['nom'];
        }
        session_destroy();
        require 'Vue/VueConnexion.php';
    }
}

?>