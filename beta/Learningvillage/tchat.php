<?php
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
	<head>
		<title>Learning village - Accueil</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		 <link rel="stylesheet"type="text/css" href="des.css" />
	</head>
	<body>
		<div id="en_tete">
		</div>

	

		<div id="menu">		
			<div class="element_menu">
				<h3>Menu</h3>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<?php     if(!isset($_SESSION['username'])){	
		   			 
					    ?>
					    <li><a href="inscrip.php">Inscription</a></li>
					 <?php  } ?>
					<li><a href="theme.php">Les Themes</a></li>
					<li><a href="eleve.php">Les Eleves</a></li>
					<li><a href="prof.php">Les Profs</a></li>
					<li><a href="workgroup.php">Les WorkGroups</a></li>
				</ul>
			</div>			
		</div>

		<div id="corps">
			
<form action="chat_post.php" method="post">
        <p>
                <label for="text">Message</label> :  <input type="text" name="text" id="text" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>


<?php
try
{
	
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=sql.olympe-network.com;dbname=139695?membres', '139695_membres', 'maimai', $pdo_options);

    

    $reponse = $bdd->query('SELECT nom,text FROM CHAT ORDER BY ID DESC LIMIT 0, 10');

    while ($donnees = $reponse->fetch())
    {
        echo '<p><strong>' . htmlspecialchars($donnees['nom']) . '</strong> : ' . htmlspecialchars($donnees['text']) . '</p>';
    }
    
    $reponse->closeCursor();
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>
		
		</div>
				<div id="pied_de_page">
			<p>Copyright 2012, tous droits réservés</p>
		</div>	 
		

  	
	</body>
</html>
