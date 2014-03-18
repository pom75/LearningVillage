<?php
session_start(); 
 if(!isset($_SESSION['username'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	
	<script type="text/javascript">
function VerifMail()
	{
	a = document.forms["page1"].email.value;
	valide1 = true;
	
	for(var j=1;j<(a.length);j++){
		if(a.charAt(j)=='@'){
			if(j<(a.length-4)){
				for(var k=j;k<(a.length-2);k++){
					if(a.charAt(k)=='.') valide1=false;
				}
			}
		}
	}
	
	return valide1;
	}

function verif_champ(){
         
		 if(document.forms["page1"].mdpp.value != "prof" && document.forms["page1"].mdpp.value.length != 0){
         alert ("Vous n'est pas un prof");
         document.forms["page1"].mdpp.focus(); 
         return false;}
         
         if (document.forms["page1"].nom.value.length<2){
         alert("Votre Pseudo doit comporter 3 lettres minimium!");
         document.forms["page1"].nom.focus();
         return false;}         
                                        
         if (document.forms["page1"].prenom.value.length<2){
         alert("Votre Pseudo doit comporter 3 lettres minimium!");
         document.forms["page1"].prenom.focus();
         return false;}
                  
         if (document.forms["page1"].mot_passe.value.length<5){
         alert("Votre mot de passe doit comporter 5 lettres minimium!");
         document.forms["page1"].mot_passe.focus();
         return false;}
		 
		 if(document.forms["page1"].mot_passe.value != document.forms["page1"].mot_passebis.value){
         alert ("Vos mots de passe ne coincident pas!");
         document.forms["page1"].mot_passe.focus(); 
         return false;}
		 
         
         if (document.forms["page1"].email.value.length<5){
         alert("Votre e-mail n'est pas valide !");
         document.forms["page1"].email.focus();
         return false;}
		 
		 if(VerifMail()){
		 alert("Votre e-mail n'est pas valide !");
         document.forms["page1"].email.focus();
		 return false;}
		 
		 
         return true;
         
		 
		 }

		 
</script>
	<head>
		<title>Learning village - Les WorkGroups</title>
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
					<li><a href="inscrip.php">Inscription</a></li>
					<li><a href="theme.php">Les Themes</a></li>
					<li><a href="eleve.php">Les Eleves</a></li>
					<li><a href="prof.php">Les Profs</a></li>
					<li><a href="workgroup.php">Les WorkGroups</a></li>
				</ul>
			</div>			
		</div>

		<div id="corps">
			<h1>Inscription</h1>
				<?
				if($auth==1){
				echo "<p><font color=\"red\"> Cette e-mail est déja utilisé par un membre.Merci d'en choisir une autre.</font><p>";
				}
				if($auth==2){
				echo "<p><font color=\"red\"> Ce pseudo est déja utilisé par un membre.Merci d'en choisir un autre.</font><p>";
				}
				?>
				<p>Tous les champs sont obligatoire</p><br>
				<form action="inscrip2.php" method="post" name="page1" onsubmit="return verif_champ()">
				<table cellspacing="2" cellpadding="2" border="0">
				
				<tr>
				<td> Votre Nom :</td>
				<td><input type="text" name="nom" ></td>
				</tr>
				
				<tr>
				<td> Votre Prenom :</td>
				<td><input type="text" name="prenom" ></td>
				</tr>
				
				<tr>
				<td> Votre mot de passe :</td>
				<td><input type="password" name="mot_passe" id="mot_passe"></td>
				</tr>
				
				<tr>
				<td> Retapez votre mot de passe:</td>
				<td><input type="password" name="mot_passebis" id="mot_passebis"></td>
				</tr>
				
				<td> adresse e-mail (vérification) :</td>
				<td><input type="text" name="email" id="email"></td>
				</tr>
				
				<td> Mot de passe prof (ne rien mettre pour les Žleves):</td>
				<td><input type="password" name="mdpp" ></td>
				</tr>
				
				
				<tr>
				<td></td>
				<td><input type="submit" name="Je m'inscris"></td>
				</tr>
				</TD>
				</TR>
				
				</TABLE>


		</div>

		<div id="pied_de_page">
			<p>Copyright 2012, tous droits réservés</p>
		</div>	   	
	</body>
</html>
				<?php
				}else
				{
				$error = 3;
				header('Location: index.php?error=3');
				}
