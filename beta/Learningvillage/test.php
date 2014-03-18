<?php
    $last_co = Date("Y-m-d");
    $db = mysql_connect('sql.olympe-network.com', '139695_membres', 'maimai'); 
	mysql_select_db('139695?membres',$db); 
	
	$ousername = '';
	if(isset($_POST['mdp'], $_POST['mail']))
	{

		if(get_magic_quotes_gpc())
                {

                        $ousername = stripslashes($_POST['mail']);
                        $username = mysql_real_escape_string(stripslashes($_POST['mail']));
                        $password = stripslashes($_POST['mdp']);
                }
                else
                {

                        $username = mysql_real_escape_string($_POST['mail']);
                        $password = $_POST['mdp'];
                }

				mysql_select_db('UTILISATEUR',$db);

				$sql = "SELECT * FROM UTILISATEUR WHERE mail = '".$username."'";

				
				$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

				$dn = mysql_fetch_assoc($req);
				
				
				if($dn['pwd']==$password and mysql_num_rows($req)>0)
                {			    	$idu = $dn['iduser'];
						$sql = "UPDATE UTILISATEUR SET last_co = '$last_co' WHERE iduser = '$idu' ";
						$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
						$sql = "UPDATE UTILISATEUR SET ip = '".$_SERVER['REMOTE_ADDR'].' '.$dn['ip']."' WHERE iduser = '$idu' ";
						$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

					session_start(); 
					$_SESSION['username'] = $dn['prenom'];
                   			$_SESSION['userid'] = $dn['iduser'];
					$_SESSION['prof'] = $dn['prof'];
					
				mysql_close(); 
				?>
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Connexion rŽussit </title>
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
			<h1>Bienvenue <? echo $_SESSION['username']; ?> sur Learning village</h1>

			<p>
				Connexion réussit
			</p>
			
			
		 
		</div>
				<div id="pied_de_page">
			<p>Copyright 2012, tous droits réservés</p>
		</div>	 
		

  	
	</body>
</html>

					
				<?php
				}else
				{
				$error = 1;
				header('Location: index.php?error=1');
				}
	}else
	{

	header('Location : index.php?error=2');
	}
	?>

