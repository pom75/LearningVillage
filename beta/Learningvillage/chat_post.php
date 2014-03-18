<?php

session_start(); 





	$db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
	mysql_select_db('139695?membres',$db); 

 
			$sql = "SELECT nom FROM UTILISATEUR WHERE iduser = '".$_SESSION['userid']."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$dn = mysql_fetch_assoc($req);
			
			$nom = $dn['nom'];
			$text = $_POST['text'];
			$idu = $_SESSION['userid'];
			
			
			
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=sql.olympe-network.com;dbname=139695?membres', '139695_membres', 'maimai', $pdo_options);
    
	$req = $bdd->prepare('INSERT INTO CHAT (nom,text,idu) VALUES(:nom,:text,:idu)');
	$req->execute(array(
		'nom' => $nom,
		'text' => $text,
		'idu' => $idu
		));
    header('Location: tchat.php');



?>