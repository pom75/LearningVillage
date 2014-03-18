<?php
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Les Themes - Ajout</title>
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

		<?php     if($_SESSION['prof']==1){
   			 
    ?>
        	<div id="menu3">		
			<div class="element_menu">
				<h3>Menu</h3>
				<li><a href="themea.php">Ajouter un Theme</a></li>

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
		<?php  } ?>

		<div id="corps">

 				


			<h1>Mes Notes : </h1>

<?php
				$db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 
			
			$sqll = "SELECT * FROM FAIRE WHERE FAIRE.iduser1 = '".$_SESSION['userid']."' AND  FAIRE.note  != '-1' "; 
			$reqq = mysql_query($sqll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			
				while($data = mysql_fetch_assoc($reqq)) 
  				{ 
  				
				$sql = "SELECT * FROM EXO WHERE idexo = '".$data['idexo']."' "; 
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
				$dn = mysql_fetch_assoc($req);

  				?>
				<p> Nom de l'exercice : <? echo $dn['nomexo']; ?>  <br>    Note : <? echo $data['note']; ?>  <br>   Remarque : <? echo $data['remarque']; ?> <br><br> </p>
   				<?php }  
			
				$sql = "SELECT * FROM EVALUE WHERE idu1 = '".$_SESSION['userid']."' "; 

				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
				while($data = mysql_fetch_assoc($req)) 
  				{ ?>
				<p> Les notes : <? echo $data['note']; ?>  <br>    </p>
   				<?php }  ?>
			</div>

		<div id="pied_de_page">
			<p>Copyright 2012, tous droits réservés</p>
		</div>	   	
	</body>
</html>
				