<?php
session_start();
?>

<!DOCTYPE html>
<html>

	<?php
		$database = "piscine";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
	
		$id = $_SESSION['id'];
		$_SESSION['auteur_publi'] = $id;
		$sql = "SELECT * FROM membre WHERE id = '$id'";
		$tab = mysqli_query($db_handle, $sql);
		$row= mysqli_fetch_array($tab);
		$nom = $row['nom'];
		$prenom = $row['prenom'];
		$job = $row['travail'];
		$sql10 = "SELECT * FROM utilisateur WHERE id = '$id'";
		$tab10 = mysqli_query($db_handle, $sql10);
		$row10= mysqli_fetch_array($tab10);
		$entreprise = $row10['entreprise'];
		
		// $sql = "SELECT id_1 FROM relation WHERE id_1 = '$id' or id_2 = '$id' GROUP BY id_1 ";
		// $tab1 = mysqli_query($db_handle, $sql);
		// $row1 = mysqli_fetch_array($tab1);

		// $nb_relation = count($row1);
	?>

    <head>

        <title>Intemento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/sommairecss.css" rel="stylesheet" type="text/css" />

    </head>

	<header>

		<div class="titre">
	        <p><img class="testimg"src= "image/intemento" ></p>    
	    </div>

		<nav>

			<ul>
				<a href="sommaire.php">Accueil </a>
				<!-- <a href="reseau.php">Reseau </a> -->
				<a href="emploi.php">Emploi </a>
				<!-- <a href="messagerie.php">Messagerie </a> -->
				<!-- <a href="notification.php">Notification </a> -->
				<a href="vous.php">Profil </a>
			</ul>

		</nav>
		
		<div class="rechercher">
			
			<form id="formulaire" action="rechercherTraitement.php" method="post">
				
				<tr>
					<td><input onKeyPress="if(event.keyCode == 13) validerForm();" type="text" name="recherche" placeholder="rechercher profil"></td>
				</tr> 

			</form>
			<?php
		if(isset($_GET["error_message10"]))
            {
              $error_message10 = $_GET["error_message10"];
        ?>
        
        <p style = "color : red"> <?php echo $error_message10; ?></p>
          
        <?php } ?>

		</div>

		<div class="publi">

			<p>	 Bienvenue sur le Site INTEMENTO</p>
			<p>	Pourquoi Intemento ? D’origine Italienne, 'Inte' est la base du mot intelligente qui signifie intelligent et 'Mento' qui est la terminaison du mot reclutamento, traduit veut dire recrutement. En combinant la base de intelligente et la terminaison  de reclutamento, nous obtenons notre nom Intemento.</p>
			<p>Le but de notre projet est de créer un site web à destination des entreprises et des chercheurs d'emploi. Ce site aurait pour but de mettre en avant les soft skills. </p>
			<p>En effet, nous pensons qu’aujourd’hui avoir un site de recrutement qui permettrait autant aux entreprises qu’aux chercheurs d'emploi de trouver un profil qui leur correspond, non seulement au niveau des hard skills mais aussi au niveau des soft skills.</p>	
		</div>
			<!-- <form enctype="multipart/form-data" action="publierTraitement.php" method="post">

				<table id="publication">
					<p> </p>
					<p> </p>
					<tr>
						<td>Titre de l'evenement : </td>
						<td><input type="text" name="titre"/></td>
					</tr>

					<tr>
						<td>Date de l'evenement : </td>
						<td><input type="date" name="date1"/></td>
					</tr>

					<tr>
						<td colspan="2"><input type="Submit" value="Publier"/></td>
					</tr>

				</table>

			</form>
			<?php
          		if(isset($_GET["error_message"]))
          		{
             	$error_message = $_GET["error_message"];
        	?>
          	<p style = "color : red"> 
          	<?php echo $error_message; ?>
          	</p>
        	<?php
          	}
			?>
		</div>

		<div class="publi">

		<?php
		if(isset($_GET["error_message10"]))
            {
              $error_message10 = $_GET["error_message10"];
        ?>
        
        <p style = "color : red"> <?php echo $error_message10; ?></p>
          
        <?php } ?>

			

			<form enctype="multipart/form-data" action="publierTraitement.php" method="post">

				<table id="publication">
					<p> </p>
					<p> </p>
					<tr>
						<td>Titre de l'evenement : </td>
						<td><input type="text" name="titre"/></td>
					</tr>

					<tr>
						<td>Date de l'evenement : </td>
						<td><input type="date" name="date1"/></td>
					</tr>

					<tr>
						<td colspan="2"><input type="Submit" value="Publier"/></td>
					</tr>

				</table>

			</form>
			<?php
          		if(isset($_GET["error_message"]))
          		{
             	$error_message = $_GET["error_message"];
        	?>
          	<p style = "color : red"> 
          	<?php echo $error_message; ?>
          	</p>
        	<?php
          	}
			?>
		</div>
 -->
		<div class="pr">

			<?php
			$chemin1 = "profil/$id.jpg";
			if (is_file($chemin1))
			{?>
			<p><img src = profil/<?php echo $id;?>></p>
			<?php } 
			else
			{?>
			<p><img src = "profil/0"></p>
		<?php } ?>
			<p><?php echo 'Nom : '.$nom;?> </p>
			<p><?php if ($entreprise==1){}else{echo 'Prénom : '.$prenom;}?></p>
			<p><?php if (!$job){}else{echo $job;}?></p>
		</div>

	</header>
			

	
    <body>
	
	

	<!-- <section>
		<div id="titre2">
			<h2>Fil d'actualités</h2>
			<?php
				$sql = "SELECT * FROM evenement";
				$result = mysqli_query($db_handle, $sql);


				while($data = mysqli_fetch_assoc($result))		
				{		
					?>
					<form enctype="multipart/form-data">
					<?php


					echo "Titre de l'evenement:".$data['titre'].'<br>';

					echo "Date de l'evenement :".$data['date_evenement'].'<br>';

					echo "Date publiée        :".$data['temps'].'<br>';

					echo "Nombre de like      :".$data['nb_like'].'<br>';

					?>

					</form>	

					<form action="sommaireliker.php" method="post">

						<tr>
							<td> <input type="submit" value="liker"\> </td>
							<?php $_SESSION['id_evenement'] = $data['id_evenement']; ?>
						</tr>

					</form>

					<?php
					
					echo "<br>";

					?>
					
					<?php

				}

				while($data = mysqli_fetch_assoc($result))		
				{		
					?>
					<form enctype="multipart/form-data">
					<?php

					echo "Titre de l'evenement:".$data['titre'].'<br>';

					echo "Date de l'evenement :".$data['date_evenement'].'<br>';

					echo "Date publiée        :".$data['temps'].'<br>';

					echo "Nombre de like      :".$data['nb_like'].'<br>';

					?>

					</form>	

					<form action="sommaireliker.php" method="post">

						<tr>
							<td> <input type="submit" value="liker"\> </td>
							<?php $_SESSION['id_evenement'] = $data['id_evenement']; ?>
						</tr>

					</form>

					<?php
					
					echo "<br>";

					?>
					
					<?php


				}

			?>


		</div> -->

			</div>


	</section>
	
	<div id="footer">

        <p>Intemento</p> 
        <p>Contact : assistance@intemento.fr</p>

    </div>
	
	</body>
	
	<div class="deco">
		<form action="deco.php" method="post">
			<td> <input type="submit" value="Deconnection"\> </td>
		</form>
	</div>
	
	
</html>