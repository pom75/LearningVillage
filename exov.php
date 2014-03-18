<?php
session_start(); 
 if($_SESSION['prof'] == 1){
?>


<?php 


	$nomexo = $_POST['nomexo'];
	$text = $_POST['text'];
	$nbetoile = $_POST['nbetoile'];

    
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=sql.olympe-network.com;dbname=139695?membres', '139695_membres', 'maimai', $pdo_options);
    
    $req = $bdd->prepare("INSERT INTO EXO(nomexo,text,nbetoile) VALUES(:nomexo, :text, :nbetoile)");
	$req->execute(array(
		'nomexo' => $nomexo,
		'text' => $text,
		'nbetoile' => $nbetoile
		));
	
	 
	$db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db);
	
	
	$sql = "SELECT idexo FROM EXO WHERE nomexo = '$nomexo' ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	$dn = mysql_fetch_assoc($req);
	
	$idtuto = $_GET['id'];
	$idexo = $dn['idexo'];
	
	
    $req = $bdd->prepare("INSERT INTO COMPOSE(idtuto,idexo) VALUES(:idtuto, :idexo)");
	$req->execute(array(
		'idtuto' => $idtuto,
		'idexo' => $idexo
		));

	$sql = "SELECT idcmp,idexo FROM COMPOSE WHERE idexo = '".$dn['idexo']."' ";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	$dn = mysql_fetch_assoc($req);

	
		$sql = "UPDATE EXO SET idcmp='".$dn['idcmp']."' WHERE idexo = '".$dn['idexo']."' ";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

			$sql = "SELECT nomtheme FROM THEME WHERE idtheme = '".$_GET['idt']."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$dn = mysql_fetch_assoc($req);
			$nomt = $dn['nomtheme'];

			$sql = "SELECT iduser FROM INTERESSE WHERE idtheme = '".$_GET['idt']."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			while($dn = mysql_fetch_assoc($req)) 
    			{ 
			$iduser1 = $dn['iduser'];
			$iduser2 = '5';
			$sujet = 'Message automatique : Mise ˆ jour du thme '.$nomt;
			$texte = 'Un nouvel ŽlŽment a ŽtŽ ajoutŽ dans se thme !';
			$rep = '0';


   			 $req = $bdd->prepare("INSERT INTO QUESTION(iduser1,iduser2,sujet,texte,rep) VALUES(:iduser1,:iduser2,:sujet,:texte,:rep)");
    			 $req->execute(array(
			'iduser1' => $iduser1,
			'iduser2' => $iduser2,
			'sujet' => $sujet,
			'texte' => $texte,
			'rep' => $rep
			));
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
			<p>Exo ajouté.


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
