<?php
/**
 * Ce fichier contient toutes les fonctions qui réalisent des opérations
 * sur la base de données, telles que les requêtes SQL pour insérer, 
 * mettre à jour, supprimer ou récupérer des données.
 */

/**
 * Définition des constantes de connexion à la base de données.
 *
 * HOST : Nom d'hôte du serveur de base de données, ici "localhost".
 * DBNAME : Nom de la base de données
 * DBLOGIN : Nom d'utilisateur pour se connecter à la base de données.
 * DBPWD : Mot de passe pour se connecter à la base de données.
 */
define("HOST", "localhost");
define("DBNAME", "lippler1");
define("DBLOGIN", "lippler1");
define("DBPWD", "lippler1");

/** getMovies
 * 
 * Cette fonction interroge la base de données pour récupérer la liste des films disponibles.
 * Elle retourne un tableau contenant les informations nécessaires : titre, affiche et identifiant.
 * 
 * @return array|false La liste des films ou false en cas d'échec.
 */
function getMovies() {
    // Connexion à la base de données (à adapter selon votre configuration)
    global $db; // Supposons que $db est une instance PDO déjà configurée
    try {
        $query = $db->prepare("SELECT id, titre, affiche FROM films");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC); // Retourne un tableau associatif
    } catch (Exception $e) {
        return false; // En cas d'erreur, retourne false
    }
}
