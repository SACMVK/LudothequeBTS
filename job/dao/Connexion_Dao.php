<?php

function getUserFromId(int $idUser){
    
}

function isConnexionValide(string $pseudo, string $mdp){
    
    $connexionValide = true;
    
	$pdo = openConnexion();
	$requete = "SELECT idUser, pseudo, mdp FROM 'compte' WHERE pseudo='".$pseudo."';";
	$stmt = $pdo->prepare($requete);
	$stmt->execute() ;

	$individu[] = null;

	while ($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$individu ['idUser'] = $ligne['idUser'];
                $individu ['pseudo'] = $ligne['pseudo'];
                $individu ['mdp'] = $ligne['mdp'];
	}
	$pdo = closeConnexion();
        if ($individu ['mdp']!=$mdp){
             $connexionValide = false;
        }
        
	return $connexionValide;    
}



