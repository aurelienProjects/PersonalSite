<?php

    // ---------------- ENVOI D'UN MAIL DE CONFIRMATION ------------------------ //

    // En paramètre de la fonction : l'email de l'utilisateur et la clé générée 
    function envoi($email,$cle){

        // Préparation du mail contenant le lien d'activation
        $destinataire = $email;
        $sujet = "Activer votre compte";
        $entete = "From: aurelien@aurelien-projetcs.com";

        // NE PAS TABULER LE TEXTE CI-DESSOUS (sinon cela changera l'aperçu du mail reçu par l'utilisateur)
        $message = utf8_decode('Bienvenue sur Aurélien Website,
 
Pour activer votre compte, veuillez cliquer sur le lien ci-dessous ou copier/coller dans votre navigateur Internet.
								
https://aurelien-projetcs.com/validation.php?email=' . urlencode($email) . '&cle=' . urlencode($cle) . '
								


Aurélien Website
							
---------------------------------------------------------
Ceci est un mail automatique, merci de ne pas y repondre.');


        mail($destinataire, $sujet, $message, $entete); // Envoi du mail


    }
    // -------------------------------------------------------------------------- //
    



