<?php
// Cette classe servira à transferer, en mode objet, des données entre le modèle, le contrôleur et la vue
class Emplacement {
    public $idEmplacement;
    public $idType;
    public $adrEmplacement;
	public $dateConstruction;

    public function __construct($idEmplacement, $idType, $adrEmplacement, $dateConstruction) {
        $this->idEmplacement = $idEmplacement;
        $this->idType = $idType;
        $this->adrEmplacement = $adrEmplacement;
		$this->dateConstruction = $dateConstruction;
    }
}
?>