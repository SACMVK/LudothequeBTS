<?php



function generer_donnees_exemplaires(int $nombreExemplaires, int $nombreJeux , int $nombreIndividus){
    for ($indice = 1; $indice<=$nombreExemplaires; $indice++)
    {
        
        $list["idPC"] = rand(1, $nombreJeux);
        $list["idProprietaire"] = rand(1, $nombreIndividus);

        
        //echo "idPC : ".$list["idPC"]."<br>idProprietaire : ".$list["idProprietaire"]."<br>Etat du jeu : ".$list["etat"]."<br><br>";
        echo 'INSERT INTO exemplaire (idPC, idProprietaire)';
        echo 'VALUES ("'.$list["idPC"].'", "'.$list["idProprietaire"].'");';
echo '<br>';        
//insert($list);
    }
}

