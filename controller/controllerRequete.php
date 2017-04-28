<?php

include 'job/dao/Connexion_DataBase.php';
        
/* stefan : Cette fonction a pour objectif
 * de créer une string de requête SQL (partie "WHERE")
 * à partir des éléments des formulaires de sélection,
 * éléments envoyés dans $_POST.
 */
function createRequestFromPOST() {
    /* stefan : La requête par défaut est vide.
     * Elle restera vide s'il n'y a aucune variable
     * dans $_POST.
     */
    $stringRequest = '';
    if (!empty($_POST)){
    $stringRequest = 'WHERE ';
	foreach ($_POST as $key => $value){
            $stringRequest .= $key.'='.$value;
            /* stefan : Après son ajout à la requête,
             * on supprime le couple clé-valeur du $_POST ...
             */
            unset ($_POST [$key]);
            // stefan : ... de manière à pouvoir ajouter ou non "AND".
            if (!(empty($_POST))){
                $stringRequest .= ' AND ';  
            }
	}
    }
        return $stringRequest;
}

/* stefan : Cette fonction a pour objectif
 * de récupérer dans $_POST la liste des valeurs
 * afin de permettre des modifications
 * dans la base de données
 * (ajout, modification, suppression d'une ligne).
 */
function getValuesFormPOST(){
    $listOfValues = array();
    foreach ($_POST as $key => $value){
        $listOfValues [$key] = $value;
    }
    return $listOfValues;
}

/* stefan : Si $_GET['page'] contient un "+",
 * l'appel au contrôleur a été fait depuis index.php.
 * L'étape suivant consiste à diviser( (explode()) en deux parties cette variable.
 * La première est l'objet avec lequel il faut faire l'action.
 * La deuxième est l'action.
 */
$objectToWorkWith = $_POST['objectToWorkWith'];
$actionToDoWithObject = $_POST['actionToDoWithObject'];

// stefan : On inclue le DAO relatif à l'objet
$dao = 'job/dao/'.$objectToWorkWith.'_Dao.php';
saveTexte($dao);
include 'job/dao/'.$objectToWorkWith.'_Dao.php';
            
// stefan : On réalise l'action passée depuis le formulaire.
switch ($actionToDoWithObject)   {
    case "selectOne":
        // stefan : Partie DAO
        $request = createRequestFromPOST();
        $element = select ($request)[0];
        // stefan : Partie IHM
        $pageAAfficher =  'ihm/resultat/'.$objectToWorkWith.'.php';
        break;
    case "selectList":
        // stefan : Partie DAO
        $request = createRequestFromPOST();
        $listOfElements = select ($request);
        // stefan : Partie IHM
        $pageAAfficher =  'ihm/resultat/'.$objectToWorkWith.'_liste.php';
        break;
    case "insert":
        // stefan : Partie DAO
        $valueToInsert = getValuesFormPOST();
        insert($valueToInsert);
        // stefan : Partie IHM
        $pageAAfficher = 'ihm/pages/_old/test.php';
        break;
    case "alter":
        // stefan : Partie DAO
        $valueToAlter = getValuesFormPOST();
        alter($valueToAlter); //! alter ou update et non insert
        // stefan : Partie IHM
        // mettre en type=hidden value=[nom_page] + controller en $_POST['page']
        // $_GET['page'] = $_POST['page'];
        break;
    case "delete":
        // stefan : Partie DAO
        // stefan : Ici, on ne récupère qu'une valeur (ID).
        $idOfLineToDelete = getValuesFormPOST()[0];
        delete($idOfLineToDelete);
        // stefan : Partie IHM
        // mettre en type=hidden value=[nom_page] + controller en $_POST['page']
        // $_GET['page'] = $_POST['page'];
        break;
}     
        



