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
				Connect� :<br>
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
 			   $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 

 
$sql = "SELECT prof,prenom,nom,iduser,date_inscription,last_co FROM UTILISATEUR WHERE iduser = '".$_GET['id']."' "; 

$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
$dn = mysql_fetch_assoc($req);
	if($dn['prof']==1){
		$statue = "prof";
	}else{
		$statue = "eleve";
	}

    echo '<b>Prenom : '.$dn['prenom'].'<br>Nom : '.$dn['nom'].'<br>Numero de membre : '.$dn['iduser'].'<br>Date d inscription : '.$dn['date_inscription'].'<br>Derniere conection : '.$dn['last_co'].'<br>Statue : '.$statue.' <br>';
?>

Groupe : 
<?php

			$sqlll = "SELECT idw FROM ESTCONNECTE WHERE iduser = '".$_GET['id']."'"; 
			$reqqq = mysql_query($sqlll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			while($dat = mysql_fetch_assoc($reqqq)) {
			$sqll = "SELECT nomw FROM WORKGROUP WHERE idw = '".$dat['idw']."'"; 
			$reqq = mysql_query($sqll) or die('Erreur SQL !<br>'.$sqll.'<br>'.mysql_error()); 
			$dp = mysql_fetch_assoc($reqq);
			?> <a href="workp.php<? echo '?id='.$dat['idw']; ?>"> <? echo $dp['nomw']; ?> </a> ,
	
			<?php  } ?>
<br>
Theme  suivie :

		<?php	$sql = "SELECT idtheme FROM INTERESSE WHERE iduser = '".$_GET['id']."' "; 
			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			while($dat = mysql_fetch_assoc($req)) 
			{	
			
			$idtheme = $dat['idtheme'];

			$sqll = "SELECT nomtheme FROM THEME WHERE idtheme = '".$idtheme."'"; 
			$reqq = mysql_query($sqll) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$dn = mysql_fetch_assoc($reqq);
			?> <a href="themel.php<? echo '?id='.$idtheme; ?>"> <? echo $dn['nomtheme']; ?> </a> ,
<?php
			} 


if($dn['prof']==1 && $_SESSION['prof'] ==0){
?>

<FORM method=post action="note.php<?php echo '?id='.$_GET['id']; ?>">	
	<TR>
	<TD>Not� se prof</TD><br>
	<TD>
	<TEXTAREA rows="1" cols="13" name="note"> </TEXTAREA>
	</TD>
	</TR>	
	<br>
	<TD COLSPAN=2>
	<INPUT type="submit" value="Envoyer">
	</TD>
	</FORM>

<?php
}


mysql_close(); 
?> 



		</div>

		<div id="pied_de_page">
			<p>Copyright 2012, tous droits r�serv�s</p>
		</div>	   	
	</body>
</html>
				<?php
				}else
				{
				$error = 3;
				header('Location: index.php?error=3');
				}