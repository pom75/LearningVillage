<?php
session_start(); 
 if($_SESSION['prof'] == 0){
?>


<?php 
try
{

	$nomw = $_POST['nomw'];
	$text = $_POST['text'];
	$iduser = $_SESSION['userid'];
	$idt = $_POST['idtheme'];
	$iduser1 = $_POST['id2'];
    
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=sql.olympe-network.com;dbname=139695?membres', '139695_membres', 'maimai', $pdo_options);
    
    $req = $bdd->prepare("INSERT INTO WORKGROUPT(nomw,text,iduser,idt) VALUES( :nomw, :text , :iduser,:idt)");
	$req->execute(array(
		'nomw' => $nomw,
		'text' => $text,
		'iduser' => $iduser,
		'idt' => $idt
		));
			
			 $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
				mysql_select_db('139695?membres',$db); 
			$sql = "SELECT * FROM WORKGROUPT WHERE nomw = '".$nomw."' "; 

			$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
			$dn = mysql_fetch_assoc($req);
	 
			$iduser1 = $iduser1;
			$iduser2 = $iduser;
			$sujet = 'Message automatique : Demande de crŽation de group';
			$texte = '<a href="profil.php?id='.$iduser.'"> L utilisateur  </a> vous propose de crŽ un groupe  Du nom de '.$nomw.' , description : '.$text.' en rapport avec le sujet '.$idt.' <a href="accept.php?id='.$dn['idw'].'"> Cliquer ici pour accepter  </a>  <a href="refu.php?id='.$dn['idw'].'"> Cliquer ici pour refuser  </a>' ;
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
			<p>Groupe  creŽ.


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
