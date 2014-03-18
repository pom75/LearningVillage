<?php
session_start(); 
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Accueil</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <link rel="stylesheet"type="text/css" href="des.css" />
	</head>
	<body>
		<div id="en_tete">
		</div>

	

		<div id="menu">		
			<div class="element_menu">
				<h3>Menu</h3>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<?php     if(!isset($_SESSION['username'])){	
		   			 
					    ?>
					    <li><a href="inscrip.php">Inscription</a></li>
					 <?php  } ?>
					<li><a href="theme.php">Les Themes</a></li>
					<li><a href="eleve.php">Les Eleves</a></li>
					<li><a href="prof.php">Les Profs</a></li>
					<li><a href="workgroup.php">Les WorkGroups</a></li>
				</ul>
			</div>			
		</div>

		<div id="corps">
			
			<p>
				Deconnexion Réussie
			</p>
			<h2>Connexion</h1>
			<form action="test.php" method="post" name="page1" >
		<table cellspacing="2" cellpadding="2" border="0">
		<?
$error = $_GET['error'];
if($error==1){
echo "<p><font color=\"red\"> Mot de passe ou pseudo incorrecte.</font><p>";
}
if($error==2){
echo "<p><font color=\"red\"> Veuillez reentrer votre pseudo et mot de passe.</font><p>";
}
?>
		<td> Votre E-mail :</td>
		<td><input type="text" name="mail" ></td>
		</tr>

		<tr>
		<td> Votre mot de passe :</td>
		<td><input type="password" name="mdp"></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" name="Connexion"></td>
		</tr>
		</table>
		</form>
		
		</div>
				<div id="pied_de_page">
			<p>Copyright 2012, tous droits réservés</p>
		</div>	 
		

  	
	</body>
</html>
