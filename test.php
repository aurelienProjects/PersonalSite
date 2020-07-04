// Génération aléatoire d'une clé pour la validation par mail
<?php 
    $cle = md5(microtime(TRUE) * 100000); 
    echo $cle;
?>