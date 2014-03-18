<?php
session_start(); 
 if(isset($_SESSION['username'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Les Themes - Lecon - Tutoriel - Exercice</title>
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

		<?php     if($_SESSION['prof']==1){
   			 
    ?>



		<div id="menu3">		
			<div class="element_menu">
				<h3>Theme</h3>
				<?php 

 			$db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
			mysql_select_db('139695?membres',$db); 

			$sql = "SELECT * FROM MODIFIE WHERE idtheme = '".$_GET['id']."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			
		

			while($dn = mysql_fetch_assoc($req)) 
  								  { 

			
				if($dn['iduser'] == $_SESSION['userid']){
					?> 
					<li><a href="exocor.php<? echo '?ide='.$_GET['idt']; ?>">Afficher les exercices rendu</a></li>
					<li><a href="exosup.php<? echo '?id='.$_GET['idt']; ?>">Suprimer l'exercie</a></li>
					<li><a href="exomod.php<? echo '?id='.$_GET['idt']; ?>">Modifier l'exercice</a></li>
					<li><a href="exocor.php<? echo '?id='.$_GET['idt']; ?>">Corriger l'exercice</a></li>

					
				<?php
				}
			}

				?>
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
			</div>			
		</div>
   		<?php  } ?>
<?php     if($_SESSION['prof']==0){
   			 
    ?>

		
		<div id="menu3">		
			<div class="element_menu">
				<h3>Theme</h3>
				

					<li><a href="exofaire.php<? echo '?ide='.$_GET['idt']; ?>">Faire l'exercie</a></li>


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
			</div>			
		</div>
		<?php  } ?>

		<div id="corps">
		
		
						<?php 
 			   $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

 


   


$sql = "SELECT * FROM EXO WHERE idexo = '".$_GET['idt']."'"; 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
$dn = mysql_fetch_assoc($req);?>

  <h2> <? echo ' '.$dn['nomexo'].' (nombre d etoile :'.$dn['nbetoile'].' ) '; ?> 
 	<? echo '  </h2><p> '.$dn['text'].' <br> <br> </p>';



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