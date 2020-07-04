<?php

session_start();

function transfert()
{
    $ret        = false;
    $img_blob   = '';
    $img_taille = 0;
    $img_type   = '';
    $img_nom    = '';
    $taille_max = 2500000000;
    $image      = is_uploaded_file($_FILES['fic']['tmp_name']);

    if (!$image) {
        echo "Problème de transfert";
        return false;
    } else {
        // Le fichier a bien été reçu
        $img_taille = $_FILES['fic']['size'];

        if ($img_taille > $taille_max) {
            echo "Trop gros !";
            return false;
        }

        $img_type = $_FILES['fic']['type'];
        $img_nom  = $_FILES['fic']['name'];

        include('admin/config.php');

        // $img_blob = file_get_contents($_FILES['fic']['tmp_name']);  Récupérer les données de l'image en format binaire
        // Définir le nouveau fuseau horaire
        date_default_timezone_set('Europe/Paris');
        $date_jour = date('y-m-d h:i:s');

        // ----------------------------  Insertion image sur le serveur :  --------------------------------------------------  //
        $extension = strtolower(substr(strrchr($_FILES['fic']['name'], '.'), 1));
        $chemin_fichier_2 = "images_utilisateurs/";
        $chemin_fichier = "images_utilisateurs/{$img_nom}";

        echo "Chemin du fichier : ".$chemin_fichier; ?> <br/> <?php

        //echo is_dir('images_utilisateurs/') ? 'Le dossier existe' : 'Le dossier n\'existe pas';
        echo '<br/>';
        echo is_uploaded_file($_FILES['fic']['tmp_name']) ? 'Le fichier a été uploadé' : 'Le fichier n\'a pas été uploadé';
        //echo file_exists($_FILES['fic']['tmp_name']) ? 'Le fichier existe (tmp)' : 'Le fichier ne semble pas exister (tmp)';
        echo '<br/>';
        if (move_uploaded_file($_FILES['fic']['tmp_name'], $chemin_fichier)) {
            echo "Fichier enregistré";

            $session_utilisateur = $_SESSION['ID'];

            // ---------------- On vérifie si l'utilisateur avait déja un avatar   ----------------------- //
            $test_sessionID = $bdd->prepare('SELECT * FROM images WHERE Session_ID = :session_');
            $test_sessionID->execute(
                array('session_' => $session_utilisateur)
            );
            $session_ID = $test_sessionID->fetch(PDO::FETCH_OBJ);


            if ($session_ID) {
                $message = "Un avatar est déjà présent";
                echo '<div class="message">' . $message . '</div>';

                $suppr_image = "{$session_ID->adresse}{$session_ID->img_nom}";
                echo $suppr_image;
                unlink($suppr_image);  // on supprime l'ancien avatar du serveur FTP

                $req = $bdd->prepare('UPDATE images SET img_nom=:img_nom_, img_taille=:img_taille_, img_type=:img_type_, adresse=:adresse_, date=:date_ WHERE Session_ID=:session');
                $req->execute(array(
                    'img_nom_' => $img_nom,
                    'img_taille_' => $img_taille,
                    'img_type_' => $extension,
                    'adresse_' => $chemin_fichier_2,
                    'date_' => $date_jour,
                    'session' => $_SESSION['ID']
                ));
            } else {
                $message = "Vous pouvez ajouter un avatar";
                echo '<div class="message">' . $message . '</div>';

                $req = $bdd->prepare('INSERT INTO images(img_nom,img_taille,img_type,adresse,date,Session_ID)VALUES(:img_nom,:img_taille,:img_type,:adresse,:date,:session)');
                $req->execute(array(
                    'img_nom' => $img_nom,
                    'img_taille' => $img_taille,
                    'img_type' => $extension,
                    'adresse' => $chemin_fichier_2,
                    'date' => $date_jour,
                    'session' => $_SESSION['ID']
                ));
            }
        } else {
            echo "Erreur lors de l'enrgistrement du fichier";
        }

        echo "
        <script type='text/javascript'>document.location.replace('mon_compte.php');</script>";
        exit();
    }
}
