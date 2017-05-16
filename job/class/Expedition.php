<?php

class Expedition {

    private $envoiDateEnvoi;
    private $envoiDateReception;
    private $envoiEtatJeu;
    private $envoiPiecesManquantes;
    private $retourDateEnvoi;
    private $retourDateReception;
    private $retourEtatJeu;
    private $retourPiecesManquantes;

    function __construct($envoiDateEnvoi, $envoiDateReception, $envoiEtatJeu, $envoiPiecesManquantes, $retourDateEnvoi, $retourDateReception, $retourEtatJeu, $retourPiecesManquantes) {
        $this->envoiDateEnvoi = $envoiDateEnvoi;
        $this->envoiDateReception = $envoiDateReception;
        $this->envoiEtatJeu = $envoiEtatJeu;
        $this->envoiPiecesManquantes = $envoiPiecesManquantes;
        $this->retourDateEnvoi = $retourDateEnvoi;
        $this->retourDateReception = $retourDateReception;
        $this->retourEtatJeu = $retourEtatJeu;
        $this->retourPiecesManquantes = $retourPiecesManquantes;
    }



    
    
    
}
