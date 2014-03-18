<?php
session_start(); 

?>


<?php 
try
{

    
   				$db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

		
		$sql = "UPDATE QUESTION SET rep ='1'  WHERE idq = '".$_GET['idq']."' ";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

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
				<? echo "   ".$_SESSION['username'];
				 ?>
				 <br>
				<a href="deco.php">Deconnexion</a>
				</p>

			</div>			
		</div>
   <?php  } ?>
		<div id="menu3">		
			<div class="element_menu">
				<h3>Menu</h3>
				<ul>
					<li><a href="messup.php<? echo '?id='.$_GET['idq']; ?>">Suprimer le message</a></li>
				</ul>
			</div>			
		</div>


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
			<p> 
			<?php 
			$sqll = "SELECT * FROM UTILISATEUR WHERE iduser =  '".$_GET['id']."' "; 
			$req = mysql_query($sqll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$dn = mysql_fetch_assoc($req);
			$sqll = "SELECT * FROM QUESTION WHERE idq =  '".$_GET['idq']."' AND iduser1 = '".$_SESSION['userid']."'"; 
			$req = mysql_query($sqll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$da = mysql_fetch_assoc($req);
			?>
			<? echo '<b> De : '.$dn['nom'].' '.$dn['prenom'].', Sujet : '.$da['sujet'].' Le : '.$da['date_question'].'<br>'.$da['texte']; ?>
			</p>
			<br><br><a href="messagerie.php<? echo '?id='.$_GET['id']; ?>">RŽpondre</a>
		</div>

		<div id="pied_de_page">
			<p>Copyright 2012, tous droits réservés</p>
		</div>	   	
	</body>
</html>

