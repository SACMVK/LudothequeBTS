<?php

abstract class ProduitCulturel {

    private $idPC;
    private $nom;
    private $public;
    private $typePC;
    private $anneeSortie;
    private $description;
    private $valide;

    function __construct($anneeSortie, $nom, $public, $description, $typePC, $valide, $idPC) {
        $this->idPC = $idPC;
        $this->nom = $nom;
        $this->public = $public;
        $this->anneeSortie = $anneeSortie;
        $this->description = $description;
        $this->typePC = $typePC;
        $this->valide = $valide;
    }

    public function getIdPC() {
        return $this->idPC;
    }

    public function setIdPC($idPC) {
        $this->idPC = $idPC;
    }

    /* M : AJOUT DES PARAMETRES DE LA TABLE produit_culturel_t */

    //M : $anneeSortie
    public function getAnneeSortie() {
        return $this->anneeSortie;
    }

    public function setAnneeSortie($anneeSortie) {
        $this->anneeSortie = $anneeSortie;
    }

    //M : $description
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    //M : $typePC
    public function getTypePC() {
        return $this->typePC;
    }

    public function setTypePC($typePC) {
        $this->typePC = $typePC;
    }
    
    //M : nom
    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
    
        //M : public
    public function getPublic() {
        return $this->public;
    }

    public function setPublic($public) {
        $this->public = $public;
    }
    function getValide() {
        return $this->valide;
    }

    function setValide($valide) {
        $this->valide = $valide;
    }

}
