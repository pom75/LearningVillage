<?php
session_start(); 
 if(isset($_SESSION['username'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Profile </title>
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
				<br><a href="messagerie.php">Messagerie(0)</a><br>
				<a href="deco.php">Deconnexion</a>
				</p>

			</div>			
		</div>
   <?php  } ?>

				<?php     
				$db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

 
				$sql = "SELECT iduser FROM WORKGROUP WHERE idw = '".$_GET['id']."' "; 
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

				$dn = mysql_fetch_assoc($req);	
										

				if($_SESSION['userid']== $dn['iduser']){
   			 
    ?>
        	<div id="menu3">		
			<div class="element_menu">
				<h3>Menu</h3>
				<li><a href="worksup.php<? echo '?id='.$_GET['id']; ?>">Supprimer le WG</a></li>
				<li><a href="workmod.php<? echo '?id='.$_GET['id']; ?>">ModifiŽ le WG</a></li>

			</div>			
		</div>
   <?php  } ?>


		<div id="menu4">		
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
			
			
			<?php 
 			   $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

 
$sql = "SELECT now,text FROM WORKGROUP WHERE idw = '".$_GET['id']."' "; 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

$dn = mysql_fetch_assoc($req);


    echo 'Nom du Groupe : '.$dn['nomw'].' <br> Description : '.$dn['text'].' <br> Membre du Groupe : <br>';

$sql = "SELECT UTILISATEUR.iduser,nom FROM ESTCONNECTE INNER JOIN UTILISATEUR ON ESTCONNECTE.iduser WHERE ESTCONNECTE.idw = '".$_GET['id']."' AND ESTCONNECTE.iduser = UTILISATEUR.iduser"; 


$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

while($data = mysql_fetch_assoc($req)) 
    { ?>

   <a href="profil.php<? echo '?id='.$data['iduser']; ?>"> <? echo ' '.$data['nom'].' <br>'; ?> </a>  
   <? } 


$sql = "SELECT UTILISATEUR.iduser FROM ESTCONNECTE INNER JOIN UTILISATEUR ON ESTCONNECTE.iduser WHERE ESTCONNECTE.idw = '".$_GET['id']."' AND ESTCONNECTE.iduser = UTILISATEUR.iduser AND ESTCONNECTE.iduser = '".$_SESSION['userid']."' "; 


$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

$dn = mysql_fetch_assoc($req);

if(isset($dn['iduser'])){
?>
	</div>	<div id="corps">
			<h1>Envoyer un DŽfi a un Groupe</h1>

			<FORM method=post action="envoyerg.php<? echo '?id='.$_GET['id']; ?>">	
			<TR>
			<TD>Nom du groupe:</TD><br>
			<TD>
			<TEXTAREA rows="1" cols="13" name="nom2"></TEXTAREA>
			</TD>
			</TR>	
			<br>
			<TR>
			<TD>Sujet du dŽfi</TD><br>
			<TD>
			<TEXTAREA rows="1" cols="13" name="sujet"></TEXTAREA>
			</TD>
			</TR>	
			<br>
			<TR>
			<TD>Contenu du dŽfi</TD><br>
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




		<div id="corps">
			<h1>Messages reus</h1>
			<?php
			 $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

 
			$sql = "SELECT idg3,igw,sujet FROM WORKGQ WHERE idg1 = '".$_GET['id']."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			while($data = mysql_fetch_assoc($req)) 
    			{ 

			$sqll = "SELECT nomw FROM WORKGROUP WHERE idw =  '".$data['idg3']."' "; 
			$reqq = mysql_query($sqll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$dn = mysql_fetch_assoc($reqq);

			
   			?> <a href="lireg.php<? echo '?id='.$_GET['id']; ?><? echo '&idw='.$data['idwg']; ?>"> <? echo ' Du Groupe : '.$dn['nomw'].' , Sujet : '.$data['sujet'];?></a><br>

		

<?php
}}



mysql_close(); 


?> 
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
				?>