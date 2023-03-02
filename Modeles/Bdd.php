<?php
/**
Le mot-clé 'abstract' avant le mot 'class' permet de définir une classe
abstraite. 
1. Une classe abstraite ne peut être instanciée (on ne peut pas écrire
    $bdd = new Bdd; )
2. Dans une classe abstraite, on peut définir des méthodes abstraites.
    Ces méthodes n'auront pas de code, juste une définition.
        ex: public function test(arg1, arg2);
    Il n'y a pas {} et il y a un ; après les () de la méthode abstraite.
    - Toutes les classes qui héritent d'une classe abtraite doivent 
    implémenter les méthodes abstraites définies dans la classe mère.
    (implémenter = fournir du code à cette méthode)

 */
namespace Modeles;
use PDO;
use Modeles\Entites\Contenu;  // avec 'use', on définit un alias à la classe Modeles\Entites\contenu

abstract class Bdd {
    public static function pdo()
    {
        return new \PDO("mysql:host=127.0.0.1:3306;dbname=site", "root", "", [PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT ]);
    }

    public static function select(string $table){
        $pdostatement = self::pdo()->query("SELECT * FROM $table");
        return $pdostatement->fetchAll(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table) );       
    }

    public static function selectById(string $table, int $id)
    {
        $pdostatement = self::pdo()->query("SELECT * FROM $table WHERE id = " . $id);
        $pdostatement->setFetchMode(PDO::FETCH_CLASS, "Modeles\Entites\\" . ucfirst($table));
        return $pdostatement->fetch();
    }

    public static function insertContenu(Contenu $contenu)
    {
        $texteRequete = "INSERT INTO contenu (titre, description, image) 
                         VALUES (:titre, :description, :image)";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":titre",  $contenu->getTitre());
        $pdostatement->bindValue(":description", $contenu->getdescription());
        $pdostatement->bindValue(":image", $contenu->getimage());
        return $pdostatement->execute();
    }

    public static function updateContenu(Contenu $contenu) : bool
    {
        $texteRequete = "UPDATE contenu 
                         SET titre = :titre, description = :description, image = :image
                         WHERE id = :id";
        $pdostatement = self::pdo()->prepare($texteRequete);
        $pdostatement->bindValue(":titre", $contenu->getTitre());
        $pdostatement->bindValue(":description", $contenu->getdescription());
        $pdostatement->bindValue(":image", $contenu->getimage());
        $pdostatement->bindValue(":id", $contenu->getId());
        return $pdostatement->execute();
    }

    public static function deleteContenu(Contenu $contenu)
    {
        return self::pdo()->exec("DELETE FROM contenu WHERE id = " . $contenu->getId());
        
    }
}