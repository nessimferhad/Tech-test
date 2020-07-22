<?php

// CE FICHIER CONTENT TOUTES LES FONCTIONS UTILISEES PAR LES DIFFERENTS MODELS 
// Protected pdo fait appel a la fonction pdo dans le fichier database pour permettre la connextion a la BDD
// Protected table fait reference aux tables qui vont etre utilisées pour travailler avec

namespace Models;

abstract class Model
{

    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }
    // revoie tout le contenu de la table donnée
    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM {$this->table}";
        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        //retourne la liste des articles dans un array
        $resultats = $this->pdo->query($sql);
        // On fouille le résultat pour en extraire les données réelles
        $articles = $resultats->fetchAll();

        return $articles;
    }
}
