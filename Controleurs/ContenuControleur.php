<?php

namespace Controleurs;

use Modeles\Bdd;
use Modeles\Entites\Contenu;

class ContenuControleur {
    public function liste()
    {
        $contenus = Bdd::select("contenu");
        
        include "vues/header.html.php";
        include "vues/contenu/table.html.php";
        include "vues/footer.html.php";        
    }

    public function ajouter()
    {
        if( $_POST ){

            // A FAIRE : validation du formulaire
            $l = new contenu;
            $l->setTitre($_POST["titre"]);
            $l->setdescription($_POST["description"]);
            $l->setimage($_POST["image"]);

        
            $resultat = Bdd::insertContenu($l);
        
            if( $resultat ){
                header("Location: contenu_liste.php");
                exit;
            } else {
                echo "Erreur SQL lors de l'insertion";
            }
        }
        
        // AFFICHAGE
        $contenu = new contenu;
        include "vues/header.html.php";
        include "vues/contenu/form.html.php";
        include "vues/footer.html.php";
    }

    public function modifier($id)
    {
        $contenu = Bdd::selectById("contenu", $id);
        
        if($_POST){
            $titre = $_POST["titre"] ?? null;
            $description = $_POST["description"] ?? null;
      
        
            if( empty($erreurs) ){
                $contenu->setTitre($titre);
                $contenu->setdescription($description);
                if( Bdd::updatecontenu($contenu) ){
                    redirection("contenu_liste.php");
                } else {
                    $erreurs["generale"] = "Erreur lors de la modification en bdd";
                }
            }
        
        }
        include "vues/header.html.php";
        include "vues/contenu/form.html.php";
        include "vues/footer.html.php";
    }

    public function supprimer($id)
    {

        if($id) {
            if( is_numeric($id) ) {
                $contenu = Bdd::selectById("contenu", $id);

                if($contenu) {
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        if( Bdd::deletecontenu($contenu) == 1 ) {
                            redirection("contenu_liste.php");
                        }
                    }
                } else {
                    redirection("contenu_liste.php");
                }
            }
        }
        affichage("contenu/suppression.html.php", [ "contenu" => $contenu ]);
    }
}