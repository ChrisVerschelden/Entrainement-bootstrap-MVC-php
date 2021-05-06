<?php
// Groupe.php
// Cette classe servira à transferer, en mode objet, des données entre le modèle, le contrôleur et la vue
class Type {
    public $idType;
    public $nomType;

    public function __construct($idType, $nomType) {
        $this->idType = $idType;
        $this->nomType = $nomType;
    }
}
?>