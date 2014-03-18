<?php
session_start(); 
 if($_SESSION['prof'] == 0){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Mes Workgroupes - Création</title>
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
					<li><a href="theme.php">Les Themes</a></li>
					<li><a href="eleve.php">Les Eleves</a></li>
					<li><a href="prof.php">Les Profs</a></li>
					<li><a href="workgroup.php">Les WorkGroups</a></li>
			</div>			
		</div>


		<div id="corps">
			<h1>Créer un Workgroupe </h1>
	<p> Il faut être 2 minimum pour créé un workgroup une invitation sera envoyer a l'autre perosnne</p>
	<FORM method=post action="createworkgroupp.php">	
	<TR>
	<TD>Nom du Workgroupe</TD><br>
	<TD>
	<TEXTAREA rows="1" cols="13" name="nomw"></TEXTAREA>
	</TD>
	</TR>	
	<br>
	<TR>
	<TD>Id du thème en relation avec le Group</TD><br>
	<TD>
	<TEXTAREA rows="1" cols="13" name="idtheme"></TEXTAREA>
	</TD>
	</TR>	
	<br>
	<TR>
	<TD>text</TD><br>
	<TD>
	<TEXTAREA rows="2" cols="50" name="text"></TEXTAREA>
	</TD>
	</TR>
	<br>
	<TR>
	<TD>id de la 2eme personne du WG</TD><br>
	<TD>
	<TEXTAREA rows="1" cols="13" name="id2"></TEXTAREA>
	</TD>
	</TR>	
	<br>
	<TD COLSPAN=2>
	<INPUT type="submit" value="Créer">
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
				}
