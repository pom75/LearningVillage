<?php
session_start(); 
 if($_SESSION['prof'] == 1){
?>


<?php 
try
{
	$db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
			mysql_select_db('139695?membres',$db); 

			$sql = "SELECT iduser1,idexo FROM FAIRE WHERE idexo = '".$_GET['ide']."' "; 

			$reqq = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

					

			

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}



?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - RŽussie</title>
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
				<? echo "   ".$_SESSION['username'];?>
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
				</ul>
			</div>			
		</div>

		<div id="corps">
		<?php
			while($dn = mysql_fetch_assoc($reqq)) {
			?>
						<?php
			$iduser = $dn['iduser1'];
			$sqll = "SELECT UTILISATEUR.iduser,nom,FAIRE.idf FROM FAIRE INNER JOIN UTILISATEUR ON FAIRE.iduser1 WHERE FAIRE.idexo = '".$dn['idexo']."' AND FAIRE.iduser1 = 			UTILISATEUR.iduser"; 
			$reqq = mysql_query($sqll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			
				while($data = mysql_fetch_assoc($reqq)) 
  				{ ?>
				<a href="voirexo.php<?php echo '?idu='.$data['iduser']; ?><?php echo '&ide='.$_GET['id']; ?><?php echo '&idf='.$data['idf']; ?>"> <?php echo ' '.$data['nom']; ?> </a>  
   				<?php } 
 				echo ' <br>';
			

} ?>
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
