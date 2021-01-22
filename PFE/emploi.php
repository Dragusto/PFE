<?php
session_start();
?>

<!DOCTYPE html>
<html>

	<head>

		<title>Intemento</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/emploicss.css" rel="stylesheet" type="text/css">

	</head>

	<header>

		<div id="titre">
			<h1>Intemento</h1>
		</div>

		<nav>
			<ul>
				<a href="sommaire.php">Accueil </a>
				<a href="reseau.php">Reseau </a>
				<a href="emploi.php">Emploi </a>
				<a href="messagerie.php">Messagerie </a>
				<a href="notification.php">Notification </a>
				<a href="vous.php">Profil</a>
			</ul>
		</nav>

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

	</header>

	<body>
		
		<div id="maListe">

			<?php
				$database = "piscine";
				$db_handle = mysqli_connect('localhost','root','');
				$db_found = mysqli_select_db($db_handle, $database);

				$auteur =


				$sql = "SELECT * FROM emploi";
				$result = mysqli_query($db_handle, $sql);		
				while($data = mysqli_fetch_assoc($result))		
				{												
					echo "Travail:             ".$data['travail'].'<br>';
					echo "Lieu:                ".$data['lieu'].'<br>';
					echo "Date de début:       ".$data['dateDebut'].'<br>';
					echo "Contrat:             ".$data['contrat'].'<br>';
					echo "Description:         ".$data['description'].'<br>';
					echo "Date de publication: ".$data['datePubli'].'<br><br>';
				}
			?>
		</div>
	</body>

	<div id="footer">

        <p>Droit d'auteur Giot Chabennet © 2018 ECEconnect</p> 

        <p> Dernière mise à jour le 2/05/2018 |

        <a href="mailto:ECEconnect@gmail.com">ECEconnect@gmail.com</a> 
        
        </p>

	</div>
</html>