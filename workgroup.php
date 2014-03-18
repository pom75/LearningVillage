<?php
session_start(); 
 if(isset($_SESSION['username'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Les WorkGroups</title>
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
				<a href="profil.php<? echo '?id='.$_SESSION['userid']; ?>"> <? echo '   '.$_SESSION['username']; ?> </a> 
				 
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
				<?php     if($_SESSION['prof']==0){
   			 
    ?>
        	<div id="menu3">		
			<div class="element_menu">
				<h3>Sous-menu</h3>
				<li><a href="createworkgroup.php">Creer un Groupe</a></li>

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
			<h1>Les WorkGroups</h1>

			<!--METTRE TOUS LES WORKGROUPES EXISTANTS DEJA ET DONT LUSER NE FAIT PAS PARTI-->
			<?php 
 			   $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

			$sql = "SELECT idw,nomw FROM WORKGROUP"; 
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			while($dat = mysql_fetch_assoc($req)) 
			{ ?>
			<a href="workp.php<?php echo '?id='.$dat['idw']; ?>"> <?php echo '<b>'.$dat['nomw'].'</b>'; ?> </a> 
			
			<?php
			$idg = $dat['idw'];
			$sqll = "SELECT UTILISATEUR.iduser,nom FROM ESTCONNECTE INNER JOIN UTILISATEUR ON ESTCONNECTE.iduser WHERE ESTCONNECTE.idw = '".$dat['idw']."' AND ESTCONNECTE.iduser = UTILISATEUR.iduser"; 
			$reqq = mysql_query($sqll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			echo ' (' ;
				while($data = mysql_fetch_assoc($reqq)) 
  				{ ?>
				<a href="profil.php<?php echo '?id='.$data['iduser']; ?>"> <?php echo ' '.$data['nom']; ?> </a>  
   				<?php } 
 				echo ' ) <br>'; ?>
 			 <a href="ajouterg.php<?php echo '?id='.$idg; ?>"> Rejoindre se groupe</a>  <br>
			<?php } 

			mysql_close(); 	
			?> 	
		</div>
		
		<div id="corps">
			<h1>mes WorkGroups</h1>
			<!--TOUS LES WORKGROUPES DONT LE USER FAIT PARTI-->
			<?php 
 			   $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

			$sql = "SELECT idw,now
					FROM WORKGROUP
					WHERE idw IN (SELECT idw 
									FROM ESTCONNECTE 
									WHERE iduser='".$_SESSION['userid']."')"; 
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			while($data = mysql_fetch_assoc($req)) 
			{ ?>
			<a href="workp.php<? echo '?id='.$data['idw']; ?>"> <? echo '<b>'.$data['nomw'].'</b> <br>'; ?> </a>  
 			<? } 

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
