<?php

// On appelle la session
session_start();

// On écrase le tableau de session
$_SESSION = array();

// On détruit la session
session_destroy();

?>

<script type="text/javascript">

    localStorage.setItem('connexion','false');
    localStorage.setItem('toastBlock', 'null');
    localStorage.setItem('cookie', null);
</script>

<?php


echo "
<script type='text/javascript'>document.location.replace('index');</script>";
echo 'Vous vous êtes bien deconnectés';

exit();