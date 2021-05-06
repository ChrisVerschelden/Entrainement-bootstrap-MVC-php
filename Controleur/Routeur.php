<?php
Session_start();
//session_destroy();
require_once 'Controleur/ControleurType.php';
require_once 'Controleur/ControleurEmplacement.php';
require_once 'Controleur/ControleurConnexion.php';

class Routeur {
    // Route une requête entrante : exécution la bonne méthode de contrôleur en fonction de l'URL 
    public function routerRequete() {
		// s'il y a un parametre 'route'
		
		if(!isset($_SESSION['acces']) OR $_SESSION['acces']!="oui"){
			$controleurConnexion = new ControleurConnexion();
			$controleurConnexion->Connexion();
		}else{	
			if (!empty($_GET['route'])) {
				// on détermine avec quelle méthode de quel contrôleur on veut travailler
				switch($_GET['route']) {
					case 'emplacementCreate' :   // ajout d'un emplacement...
												$ctrlEmplacement = new ControleurEmplacement();
												$ctrlEmplacement->createEmplacement();	
												break;
											
					case 'emplacementRead' :     if (!empty($_GET['id'])) {
												$ctrlEmplacement = new ControleurEmplacement();
												$ctrlEmplacement->getEmplacement($_GET['id']);
												}
												else { // s'il manque le paramètre id alors on affiche la liste des emplacement
													$ctrlEtu = new ControleurEmplacement();
													$ctrlEtu->getListeEmplacement();
												}
												break;
											
					case 'emplacementUpdate' :   // modification d'un emplacement à partir de son id
												$ctrlEmplacement = new ControleurEmplacement();
												$ctrlEmplacement->updateEmplacement($_GET['id']);
												break;
												
					case 'emplacementDelete' :   // suppression d'un emplacement à partir de son id
												$ctrlEmplacement = new ControleurEmplacement();
												$ctrlEmplacement->deleteEmplacement($_GET['id']);
												break;
			
					case 'typeCreate' :     // ajout d'un type...
												$ctrlType = new ControleurType();
												$ctrlType->createType();
												break;
					
					case 'typeRead' :	 	    if (!empty($_GET['id'])) {
													$ctrlType = new ControleurType();
													$ctrlType->getListeEmplacementByType($_GET['id']);
												}
												else { // s'il manque le paramètre id alors on affiche la liste des type
													$ctrlGrp = new ControleurType();
													$ctrlGrp->getListeType();
												}
												break;

					case 'typeUpdate' : 	  // modification d'un type à partir de son id
												$ctrlType = new ControleurType();
												$ctrlType->updateType($_GET['id']);
												break;
											
					case 'typeDelete' : 	  // suppression d'un type à partir de son id
												$ctrlType = new ControleurType();
												$ctrlType->deleteType($_GET['id']);
												break;

					case 'deconnexion' : 	  	// retour écran connexion
												$controleurConnexion = new ControleurConnexion();
												$controleurConnexion->deconnexion();
												break;

					case 'supprimerCookie' :		//supprimer le cookie à faire
												$controleurConnexion = new ControleurConnexion();
												$controleurConnexion->supprimerCookie();
												break;
											
					default: 	              // pour toutes les autres valeurs, on affiche la liste des type 
												require 'Vue/VueAccueil.php';
												break;			
				}
			}
			// aucune paramètre 'route' : on affiche l'acceuil'
			else {  
				require 'Vue/VueAccueil.php';
			} 
		}
    }
}
