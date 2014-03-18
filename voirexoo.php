<?php
session_start(); 
 if($_SESSION['prof'] == 1){
?>


<?php 
try
{

	$note = $_POST['note'];
	$remarque = $_POST['remarque'];
	$iduser2 = $_SESSION['userid'];


    
   				$db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

		
		$sql = "UPDATE FAIRE SET note ='".$note."' , remarque = '".$remarque."' , iduser2 = '".$iduser2."'  WHERE   iduser1 = '".$_GET['idu']."' AND idf = '".$_GET['idf']."'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


 mysql_close(); 
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
				 <br><a href="messagerie.php">Messagerie(0)</a><br>
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
					<li><a href="exocorige.php">Mes Exercices corrigŽ</a></li>
				</ul>
			</div>			
		</div>

		<div id="corps">
			<p>Note envoyŽ


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
