<?php
session_start(); 

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

		<?php     if(isset($_SESSION['username'])){
		
   			 
    ?>
        		
		<div id="menu2">		
			<div class="element_menu2">
				<p>
				Connecté :<br>
				<a href="profil.php<? echo '?id='.$_SESSION['userid']; ?>"> <? echo "   ".$_SESSION['username']; ?> </a> 
				 <br>
				<a href="exocorige.php">Mes notes</a>
				<br>
				<?php
				 $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

 
			$sql = "SELECT rep FROM QUESTION WHERE iduser1 = '".$_SESSION['userid']."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$nb = 0;
			while($dn = mysql_fetch_assoc($req)) 
    			{ if($dn['rep'] == 0){
				$nb += 1;
				}
			}
?>
				<a href="messagerie.php">Messagerie(<? echo $nb;?>)</a><br>
				<a href="deco.php">Deconnexion</a>

				</p>

			</div>			
		</div>
   <?php  } ?>
	

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
					<li><a href="tchat.php">Le Tchat</a></li>
					<li><a href="workgroup.php">Les WorkGroups</a></li>
					
				</ul>
			</div>			
		</div>

		<div id="corps">
			<h1>Bienvenue <? echo $_SESSION['username']; ?> sur Learning village</h1>

			<p>
				Ce site est un site éducatif permettant des échanges entre les éleves et les professeurs
			</p>
			
								
			<?php     if(!isset($_SESSION['username'])){	
		   			 
		    ?>
		     
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
		if($error==3){
		echo "<p><font color=\"red\"> Veuillez vous connecter pour voir cette page.</font><p>";
		}
		?>
		<td> Votre e-mail :</td>
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
		 <?php  } ?>
		 
		</div>
				<div id="pied_de_page">
			<p>Copyright 2012, tous droits réservés</p>
		</div>	 
		

  	
	</body>
</html>
