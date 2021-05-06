<?php
// ModeleGroupe.php
include_once("Type.php"); 
include_once("connect.inc.php");

class ModeleType {
	// methode qui renvoie un tableau d'objets Groupes
	// ce tableau est construit à partir d'une requête SQL sur la table Groupes de la BD
    
	public function getListeType() {
		global $conn;
		$res = $conn->prepare("Select * from Type");
		$res->execute();			
		foreach($res as $type) {
		    $ListeType[] = new Type($type["idType"], $type["nomType"]);
 		}
		return $ListeType; 
	}

	public function getType($idType){
		global $conn;
		$res = $conn->prepare("Select * from Type Where idType=".$idType);
		$res->execute();
		foreach($res as $type) {
		    $return = new Type($type["idType"], $type["nomType"]);
 		}
		return $return;
	}

	public function createType(){
		global $conn;
		$res = $conn->prepare("INSERT INTO `Type`(`idType`, `nomType`) VALUES (?, ?)");
		$res->execute([substr($_POST['idType'],0, 3),$_POST['nomType']]);
		header("location:index.php?route=typeRead");
	}

	public function updateType(){
		global $conn;
		$res = $conn->prepare("UPDATE `Type` SET `nomType`=? WHERE `Type`.`idType`=?");
		$res->execute([$_POST['nomType'],$_POST['idType']]);
		header("location:index.php?route=typeRead");
	}

	public function deleteType($id){
		global $conn;
		$res = $conn->prepare("DELETE FROM `Type` WHERE `idType`=?");
		$res->execute([$id]);
		header("location:index.php?route=typeRead");
	}
}
?>
