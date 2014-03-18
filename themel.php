<?php
session_start(); 
 if(isset($_SESSION['username'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Les Themes</title>
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

			$sql = "SELECT iduser FROM MODIFIE WHERE idtheme = '".$_GET['id']."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			
		

			while($dn = mysql_fetch_assoc($req)) 
  								  { 

			
				if($dn['iduser'] == $_SESSION['userid']){
					?> 
					<li><a href="themeac.php<? echo '?id='.$_GET['id']; ?>">Ajouter une Lecon</a></li>
					<li><a href="themesup.php<? echo '?id='.$_GET['id']; ?>">Suprimer le Theme</a></li>
					<li><a href="thememod.php<? echo '?id='.$_GET['id']; ?>">Modifier le Theme</a></li>
					<li><a href="themeadmin.php<? echo '?id='.$_GET['id']; ?>">Ajouter un administrateur du theme</a></li>

					
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
				<li><a href="rejoindre.php<? echo '?id='.$_GET['id']; ?>">Suivre se theme</a></li>
			
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

 
$sql = "SELECT nomtheme,def FROM THEME WHERE idtheme = '".$_GET['id']."' ORDER BY nomtheme"; 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

$dn = mysql_fetch_assoc($req);
 ?>

  <h1> <? echo ' '.$dn['nomtheme']; ?> 
 	<? echo '  </h1><p> '.$dn['def'].' <br><br> </p>';
   


$sql = "SELECT LECON.idlecon,LECON.nomlecon FROM CONTIENT INNER JOIN LECON ON CONTIENT.idc WHERE CONTIENT.idtheme = '".$_GET['id']."'  AND CONTIENT.idc = LECON.idc "; 


$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

while($data = mysql_fetch_assoc($req)) 
    { ?>

   <a href="lecon.php<? echo '?idl='.$data['idlecon']; ?><? echo '&idt='.$_GET['id']; ?>"> <? echo ' '.$data['nomlecon'].'<br> '; ?> </a>  
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
