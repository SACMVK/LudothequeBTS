
<?php
class Jeu_P {
	// AhMaD: les attributs pour Jeu_T
	private $idJeuP;
	private $jeuT;
	private $proprietaire;
	private $etat;
	

// AhMaD: Le connecteur 
	function __construct( $proprietaire, $etat,  $jeuT,$idJeuP=-1) {
		$this->idJeuP = $idJeuP;
		$this->jeuT = $jeuT;
		$this->proprietaire = $proprietaire;
		$this->etat = $etat;
		
	}
	// AhMaD: getter et setter
	// idJeuP
	function getIdJeuP() {
		return $this->idJeuP;
	}
	function setdJeuP($idJeuP) {
		return $this->idJeuP = $idJeuP;
	}

	// idProprietaire
	function getIdProprietaire() {
		return $this->proprietaire;
	}
	function setNbIdProprietaire($proprietaire) {
		return $this->proprietaire = $proprietaire;
	}

	
	// etat
	function getEtat() {
		return $this->etat;
	}
	function setEtat($etat) {
		return $this->etat = $etat;
	}



	// idJeuT
	function getIdJeuT() {
		return $this->jeuT;
	}
	function setIdJeuT($jeuT) {
		return $this->jeuT=$jeuT;
	}

	// AhMaD: ToString pour afficher l'objet, le point pour concaténer, cela comme (+) en java
	function __toString() {
		return ("id= " . $this->idJeuP . ", Proprietaire :" . $this->idProprietaire . ", Etat: " . $this->etat  . 
			 ", JeuT: " . $this->idJeuT);
	}
}
?>
