/* 
 * Fichiers contenant les scripts de modification et d'adaptation de la base de données
 */
/**
 * Author:  Manu
 * Created: 23 mai 2017
 */

/* 
 * Ajout du champs Valider dans la table produit culturel afin de pouvoir inclure la validation d'une nouvelle proposition de jeu_t par les modératerurs
 * Ce champs est de type booléen et par défaut à True
 */

ALTER TABLE produit_culturel_t
ADD COLUMN valider TINYINT(1) NOT NULL DEFAULT '1';

