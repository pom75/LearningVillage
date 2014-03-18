<?php
session_start(); 
 if(isset($_SESSION['username'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Messagerie</title>
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
	<?php
				 $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

 
			$sql = "SELECT * FROM QUESTION WHERE iduser1 = '".$_SESSION['userid']."' "; 

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
					<li><a href="theme.php">Les Themes</a></li>
					<li><a href="eleve.php">Les Eleves</a></li>
					<li><a href="prof.php">Les Profs</a></li>
					<li><a href="workgroup.php">Les WorkGroups</a></li>
				</ul>
			</div>			
		</div>

		<div id="corps">
			<h1>Messages reçus</h1>
			<?php
			 $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

 
			$sql = "SELECT iduser2,idq,sujet,date_question FROM QUESTION WHERE iduser1 = '".$_SESSION['userid']."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			while($data = mysql_fetch_assoc($req)) 
    			{ 

			$sqll = "SELECT nom,prenom FROM UTILISATEUR WHERE iduser =  '".$data['iduser2']."' "; 
			$reqq = mysql_query($sqll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$dn = mysql_fetch_assoc($reqq);

   			?><a href="lire.php<? echo '?id='.$data['iduser2']; ?><? echo '&idq='.$data['idq']; ?>"> <? echo '<b> De : '.$dn['nom'].' '.$dn['prenom'].', Sujet : '.$data['sujet'].' Le : '.$data['date_question']; 
			if($data['rep'] == 0 ){
				echo ' non lu <br>';
			}else{ echo ' lu <br>'; }?>  
 
   			<?php } ?></a>

		</div>


		<div id="corps">
			<h1>Ecrire Un message </h1>

			<FORM method=post action="envoyer.php">	
			<TR>
			<TD>id de l'utilisateur receptionneur :</TD><br>
			<TD>
			<TEXTAREA rows="1" cols="13" name="iduser2"><?php echo $_GET['id']; ?></TEXTAREA>
			</TD>
			</TR>	
			<br>
			<TR>
			<TD>Sujet du message</TD><br>
			<TD>
			<TEXTAREA rows="1" cols="13" name="sujet"></TEXTAREA>
			</TD>
			</TR>	
			<br>
			<TR>
			<TD>Contenu du message</TD><br>
			<TD>
			<TEXTAREA rows="10" cols="80" name="texte"></TEXTAREA>
			</TD>
			</TR>
			<br>
			<TD COLSPAN=2>
			<INPUT type="submit" value="Envoyer">
			</TD>
			</FORM>
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
				} ?>