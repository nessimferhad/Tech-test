<?php

namespace Models;

// Ce fichier contient la class user qui extend et recupere les propriétés de la class Model 
// Protected table fait réference a la table de la bdd avec laquelle on travaille

class Recrue extends Model
{
    protected $table = 'equipage';

    public function insertRecrue(string $nom, string $grade): void
    {
        $query = $this->pdo->prepare('INSERT INTO equipage SET nom = :nom, grade = :grade');
        $query->execute(compact('nom', 'grade'));
    }
}
