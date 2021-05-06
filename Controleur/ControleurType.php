<?php
// ControleurEmplacement.php
include_once("Modele/ModeleType.php");
include_once("Modele/ModeleEmplacement.php");

class ControleurType {  
	private $modeleType;
	private $modeleEmplacement;
    
	public function __construct() {
        $this->modeleType = new modeleType();
		$this->modeleEmplacement = new ModeleEmplacement();  
    }
	
	public function getlisteType() {
        $vListeType = $this->modeleType->getListeType();
        include 'Vue/VueListeType.php';
    }
	
	public function getListeEmplacementByType($idType) {
		$vListeEmplacement = $this->modeleEmplacement->getListeEmplacementByType($idType);
        include 'Vue/VueListeEmplacement.php';
    }

    public function createType(){
        $vListeType = $this->modeleType->getListeType();
        $vType = null;
        include 'Vue/VueCreateType.php';
    }

    public function updateType($id){
        $vType = $this->modeleType->getType($id);
        include 'Vue/VueCreateType.php';
    }

    public function deleteType($id){
        $this->modeleType->deleteType($id);
        include 'Vue/VueListeType.php';
    }
}
?>
