<?php
include_once("Emplacement.php");
include_once("connect.inc.php");

class ModeleEmplacement {
	// methode qui renvoie un tableau d'objets Etudiants
	// ce tableau est construit à partir d'une requête SQL sur la table Etudiants de la BD
    public function getListeEmplacement() {
		// cette instruction permet d'utiliser dans cette fonction la variable $conn 
		// qui a été initialisée dans le script connect.inc.php
		global $conn;
		$res = $conn->prepare("Select * from Emplacement");
		$res->execute();			
		foreach($res as $emplacement) {
		    $ListeEmplacement[] = new Emplacement($emplacement["idEmpl"], $emplacement["idType"], $emplacement["adresseEmpl"], $emplacement["anneeConstruction"]);
 		}
		return $ListeEmplacement; 
    }
	
    public function getEmplacement($idEmplacement) {
		global $conn;
		$res = $conn->prepare("Select * from Emplacement where idEmpl = :pIdEmplacement");
		$res->execute(array('pIdEmplacement' => $idEmplacement));
		$emplacement = $res->fetch();
		$unEmplacement = new Emplacement($emplacement["idEmpl"], $emplacement["idType"], $emplacement["adresseEmpl"], $emplacement["anneeConstruction"]);
        return $unEmplacement;
    }	
	
	public function getListeEmplacementByType($idType) {
		global $conn;
		$res = $conn->prepare("Select * from Emplacement where idType = :pIdType");
		$res->execute( array ('pIdType' => $idType) );	
		$ListeEmplacementType = NULL;
		foreach($res as $emplacement) {
		    $ListeEmplacementType[] = new Emplacement($emplacement["idEmpl"], $emplacement["idType"], $emplacement["adresseEmpl"], $emplacement["anneeConstruction"]);
 		}
		return $ListeEmplacementType; 
	}	
	
	public function createEmplacement(){
		if(!empty($_FILES['choisir un fichier']) && $_FILES['choisir un fichier']['error']==0){
			header("location:index.php?route=readListeEmplacement&jeviensdela");
			$infoFich = pathinfo($_FILES['choisir un fichier']['name']);
			$ext_upload = $infoFich['extension'];
			$ext_autorisees = array('jpg','png','gif','jpeg');
			if(in_array($ext_upload,$ext_autorisees)){
				
				move_uploaded_file($_FILES['choisir un fichier']['name'],'Vue/images/'.basename($_FILES['choisir un fichier']['name']));
			}
		}else{
			header("location:index.php?route=emplacementCreate&msgErr=image de merde");
		}
		global $conn;
		$res = $conn->prepare("INSERT INTO `Emplacement`(`idEmpl`, `idType`, `adresseEmpl`, `anneeConstruction`) VALUES (?, ?, ?, ?)");
		$res->execute([substr($_POST['idEmpl'],0, 3),$_POST['selectType'],$_POST['adrEmpl'],substr($_POST['anneeConstruction'],0, 4)]);
		header("location:index.php?route=emplacementRead");
	}

	public function updateEmplacement(){
		global $conn;
		$res = $conn->prepare("UPDATE `Emplacement` SET `idType`=?, `adresseEmpl`=?, `anneeConstruction`=? WHERE `Emplacement`.`idEmpl`=?");
		$res->execute([$_POST['selectType'],$_POST['adrEmpl'],$_POST['anneeConstruction'],$_POST['idEmpl']]);
		header("location:index.php?route=emplacementRead");
	}

	public function deleteEmplacement($id){
		global $conn;
		$res = $conn->prepare("DELETE FROM `Emplacement` WHERE `idEmpl`=?");
		$res->execute([$id]);
		header("location:index.php?route=emplacementRead");
	}

}
?>
