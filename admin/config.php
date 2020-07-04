<?php


/******************************************************
----------------Configuration Obligatoire--------------
Veuillez modifier les variables ci-dessous pour que l'
espace membre puisse fonctionner correctement.
******************************************************/
// Connexion à la base de données

  //$host_name = 'db5000116661.hosting-data.io';
  //$database = 'dbs111277';
  //$user_name = 'dbu194422';
  //$password = '<Veuillez saisir ici votre mot de passe.>';
  //$bdd = mysql_connect($host_name, $user_name, $password, $database);

  $host_name = '';
  $database = '';
  $user_name = '';
  $password = '';
  $bdd = null;

  try {
    $bdd = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Erreur!: " . $e->getMessage() . "<br/>";
    die();
  }


	//	try
	//	{
	//		$bdd = new PDO('db5000116661.hosting-data.io;dbname=dbs111277;charset=utf8', 'dbu194422', 'Aure&jordan95');
	//	}
	//	catch(Exception $e)
	//	{
	//		die('Erreur : '.$e->getMessage());
	//	}
//On se connecte a la base de donnee
//mysql_connect('localhost', 'root', '');
//mysql_select_db('users');

//Email du webmaster

$mail_webmaster = 'example@example.com';

//Adresse du dossier de la top site
$url_root = 'http://www.example.com/';

/******************************************************
----------------Configuration Optionelle---------------
******************************************************/

//Nom du fichier de laccueil
$url_home = 'index.php';

//Nom du design
$design = 'css';
?>