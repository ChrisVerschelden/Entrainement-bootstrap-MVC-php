<?php
include_once("Modele/ModeleEmplacement.php");
class ControleurEmplacement {
	
    private $modeleEmplacement;
	
    public function __construct() {
          $this->modeleEmplacement = new ModeleEmplacement();
    }
	
	public function getListeEmplacement() {
        $vListeEmplacement = $this->modeleEmplacement->getListeEmplacement();
        include 'Vue/VueListeEmplacement.php';
	} 
	
    public function getEmplacement($id) {
		$vEmplacement = $this->modeleEmplacement->getEmplacement($id);
        include 'Vue/VueEmplacement.php';
    }

    public function createEmplacement(){
        $modeleType = new modeleType();
        $vListeType = $modeleType->getListeType();
        include 'Vue/VueCreateEmplacement.php';
    }

    public function updateEmplacement($id){
        $vEmplacement = $this->modeleEmplacement->getEmplacement($id);
        $modeleType = new modeleType();
        $vListeType = $modeleType->getListeType();
        include 'Vue/VueCreateEmplacement.php';
    }

    public function deleteEmplacement($id){
        $this->modeleEmplacement->deleteEmplacement($id);
        include 'Vue/VueListeEmplacement.php';
    }
	   
}
?>
