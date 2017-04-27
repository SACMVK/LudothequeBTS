<?php






/* stefan : titre page
 */
echo utf8_encode('<h1>Connexion</h1>');


/* stefan : test de r�cup�ration des donn�es de connexion dans une variable PHP
 */
echo utf8_encode(miseAJourBienvenu());



$affichage_connexion = '<DIV id=connexion><FORM name=connexion action="index.php" method="POST">';
$affichage_connexion .= '<LABEL class=text for=pseudo >Login</LABEL>';
$affichage_connexion .= '<DIV><INPUT type=text class=input name=pseudo></INPUT></DIV>';
$affichage_connexion .= '<BR>';
$affichage_connexion .= '<LABEL class=text for=mdp >Mot de passe</LABEL>';
$affichage_connexion .= '<DIV><INPUT type=password class=input name=mdp></INPUT></DIV>';
$affichage_connexion .= '<BR>';
$affichage_connexion .= '<DIV><INPUT type=submit class=bouton_connexion value="Se connecter"/></DIV>';
$affichage_connexion .= '</FORM></DIV>';



echo utf8_encode($affichage_connexion);

Function miseAJourBienvenu(){
	$paramConnexion = ['pseudo','mdp'];
	$bienvenu = 'mmmh, ce n\'est pas tr�s s�curis� tout �a !<BR>';
	foreach ( $paramConnexion as  $param ) {
		/* stefan : on commence par un test pour savoir si la cl� existe dans $_POST :
		 * si la page est charg�e, le $_POST est vide.
		 * $_POST contiendra les valeurs � mettre � jour une fois submit cliqu�.
		 */
		if(array_key_exists($param,$_POST)){
			$bienvenu .= $param.' : 	'.$_POST[$param].'<BR>';
		}
	}
	return $bienvenu;
}


?>