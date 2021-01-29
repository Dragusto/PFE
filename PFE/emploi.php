<?php
session_start();
$database = "piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
	
$id = $_SESSION['id'];
$sql = "SELECT * FROM utilisateur WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row= mysqli_fetch_array($tab);
$entreprise = $row['entreprise'];
?>

<!DOCTYPE html>
<html>

	<head>

		<title>Intemento</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/emploicss.css" rel="stylesheet" type="text/css">

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
				<a href="vous.php">Profil</a>
			</ul>
		</nav>
<div class="rechercher">
	<form id="formulaire" action="rechercheremploiTraitement.php" method="post">
		<tr>
			<td><input onKeyPress="if(event.keyCode == 13) validerForm();" type="text" name="recherche" placeholder="rechercher un emploi"></td>
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
<?php 
if($entreprise==1)
{
?>

<div class="publi">
			<form enctype="multipart/form-data" action="emploiTraitement.php" method="post">

				<table id="publication">

					<tr>
						<td>Travail : </td>
						<td><input type="text" name="travail"/></td>
					</tr>

					<tr>
						<td>Lieu : </td>
						<td><input type="text" name="lieu"/></td>
					</tr>

					<tr>
						<td>Date de début : </td>
						<td><input type="date" name="dateDebut"/></td>
					</tr>

					<tr>
						<td>Contrat : </td>
						<td><input type="text" name="contrat"/></td>
					</tr>

					<tr>
						<td>Description : </td>
						<td><input type="text" name="description"/></td>
					</tr>
					<tr><td> Profil recherché :</td> 
						<td><label><select name="profil" style="font-size:16px">
							<option value="profil">  </option>
							<option value="profil1">Infirmier</option>
							<option value="profil2">Excécutant</option>
							<option value="profil3">Gardien</option>
							<option value="profil4">Aide à domicile</option>
							<option value="profil5">Mécanicien</option>
							<option value="profil6">Homme d'action</option>
							<option value="profil7">Acteur</option>
							<option value="profil8">Artiste</option>
							<option value="profil9">Directeur</option>
							<option value="profil10">Scientifique</option>
							<option value="profil11">Visionnaire</option>
							<option value="profil12">Penseur</option>
							<option value="profil13">Donateur</option>
							<option value="profil14">Protecteur</option>
							<option value="profil15">Charismatique</option>
							<option value="profil16">idéaliste</option>

					  </select></label></td>
					</tr> 
					<tr>
						<td>Contact : </td>
						<td><input type="text" name="contact"/></td>
					</tr>
					<tr>
						<td colspan="2"><input type="Submit" value="Publier"/></td>
					</tr>

				</table>

			</form>
</div>
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
}else{?>

<?php
}
?>



	</header>

	<body>
		
		<div id="maListe">

			<?php


				$sql = "SELECT * FROM emploi";
				$result = mysqli_query($db_handle, $sql);		
				while($data = mysqli_fetch_assoc($result))		
				{
					$nomentreprise = $data['id'];
					$sql10 = "SELECT * FROM utilisateur WHERE id = '$nomentreprise'";
					$tab10 = mysqli_query($db_handle, $sql10);
					$row10 = mysqli_fetch_array($tab10);							
					echo "Entreprise :		   ".$row10['nom'].'<br>';	
					echo "Travail:             ".$data['travail'].'<br>';
					echo "Lieu:                ".$data['lieu'].'<br>';
					echo "Date de début:       ".$data['dateDebut'].'<br>';
					echo "Contrat:             ".$data['contrat'].'<br>';
					echo "Description:         ".$data['description'].'<br>';
					echo "Date de publication: ".$data['datePubli'].'<br>';
					echo "Contact: ".$data['contact'].'<br>';
					if($data['profil']!=''){echo "Profil recherché:	   ".$data['profil'].'<br><br>';}
					?> <br></br><?php
				}
			?>
		</div>
	</body>

	<div id="footer">


	</div>
</html>