<?php

class Pret {

    private $idPret;
    private $jeuP;
    private $emprunteur;
    private $propositionEmprunteurDateDebut;
    private $propositionEmprunteurDateFin;
    private $propositionPreteurDateDebut;
    private $propositionPreteurDateFin;
    private $notification;
    private $statutDemande;

    function __construct($jeuP, $emprunteur, $propositionEmprunteurDateDebut, $propositionEmprunteurDateFin, $propositionPreteurDateDebut, $propositionPreteurDateFin, $notification, $statutDemande, $idPret = -1) {
        $this->idPret = $idPret;
        $this->jeuP = $jeuP;
        $this->emprunteur = $emprunteur;
        $this->propositionEmprunteurDateDebut = $propositionEmprunteurDateDebut;
        $this->propositionEmprunteurDateFin = $propositionEmprunteurDateFin;
        $this->propositionPreteurDateDebut = $propositionPreteurDateDebut;
        $this->propositionPreteurDateFin = $propositionPreteurDateFin;
        $this->notification = $notification;
        $this->statutDemande = $statutDemande;
    }

    public function getIdPret() {
        return $this->idPret;
    }

    public function setIdPret($idPret) {
        return $this->idPret = $idPret;
    }

    public function getJeuP() {
        return $this->jeuP;
    }

    public function setJeuP($jeuP) {
        return $this->jeuP = $jeuP;
    }

    public function getEmprunteur() {
        return $this->emprunteur;
    }

    public function setEmprunteur($emprunteur) {
        return $this->emprunteur = $emprunteur;
    }

    public function getPropositionEmprunteurDateDebut() {
        return $this->propositionEmprunteurDateDebut;
    }

    public function setPropositionEmprunteurDateDebut($propositionEmprunteurDateDebut) {
        return $this->propositionEmprunteurDateDebut = $propositionEmprunteurDateDebut;
    }

    public function getPropositionEmprunteurDateFin() {
        return $this->propositionEmprunteurDateFin;
    }

    public function setPropositionEmprunteurDateFin($propositionEmprunteurDateFin) {
        return $this->propositionEmprunteurDateFin = $propositionEmprunteurDateFin;
    }

    public function getPropositionPreteurDateDebut() {
        return $this->propositionPreteurDateDebut;
    }

    public function setPropositionPreteurDateDebut($propositionPreteurDateDebut) {
        return $this->propositionPreteurDateDebut = $propositionPreteurDateDebut;
    }

    public function getPropositionPreteurDateFin() {
        return $this->propositionPreteurDateFin;
    }

    public function setPropositionPreteurDateFin($propositionPreteurDateFin) {
        return $this->propositionPreteurDateFin = $propositionPreteurDateFin;
    }

    public function getNostification() {
        return $this->notification;
    }

    public function setNotification($notification) {
        return $this->notification = $notification;
    }

    public function getStatutDemande() {
        return $this->statutDemande;
    }

    public function setStatutDemande($statutDemande) {
        return $this->statutDemande = $statutDemande;
    }

}
