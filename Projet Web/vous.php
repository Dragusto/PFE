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
$sql = "SELECT * FROM membre WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row= mysqli_fetch_array($tab);
$nom = $row['nom'];
$prenom = $row['prenom'];
$email = $row['email'];
$job = $row['travail'];
$birth = $row['date_de_naissance'];
$city = $row['ville'];
$adresse = $row['adresse'];

$sql = "SELECT id_1 FROM relation WHERE id_1 = '$id' or id_2 = '$id' GROUP BY id_1 ";
$tab1 = mysqli_query($db_handle, $sql);
$row1 = mysqli_fetch_array($tab1);

$nb_relation = count($row1);


?>

<head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/vouscss.css" media="screen" type="text/css">
    </head>
		<!-- Here is the menu area -->
	<header>
        <div class="titre">
            <h1>Intemento</h1>     
        </div>
		<nav>
			<ul>
				<a href="sommaire.php">Acceuil </a>
				<a href="reseau.php">Reseau </a>
				<a href="emploi.php">Emploi </a>
				<a href="messagerie.php">Messagerie </a>
				<a href="notification.php">Notification </a>
				<a href="vous.php">Profil </a>
			</ul>
		</nav>
		
	</header>
	<div class="pr">
		<p><a href="parametre.php">Paramètre</a></p>
		<?php 
		$chemin = 'CV/'.$id.'.pdf';
		if (is_file($chemin))
		{?>
		<p><a href="CV/<?php echo $id.".pdf";?>">Curriculum vitae</a></p>
		<?php } ?>
		<p><a href="reseau.php">Relation(<?php echo $nb_relation ?>)</a></p>
		<p><a href="photo.php">Photos</a></p>
	</div>
	
		<div class="right">
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
		<p> Nom : <?php echo $nom; ?> </p>
		<p> Prénom : <?php echo $prenom; ?> </p>
		<?php if(!$adresse){}else{echo 'Adresse : '.$adresse; } ?><p> </p>
		<?php if(!$job){}else{ echo 'Statut : '.$job;} ?><p> </p>
		<?php if(!$birth){}else{ echo 'Date de naissance : '.$birth;} ?><p> </p>
		</div>
	<body>
		
		<section>
		<div id="titre2">
			<h2>Fil d'actualités du profil</h2>
			<?php
				$sql = "SELECT * FROM evenement WHERE auteur = '$id'";
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
		</div>
	</section>
	
	</body>
	
	<div id="footer">

			<p>Droit d'auteur © 2020 Intemento</p> 
			<p> | 
				<a href="mailto:Intemento@gmail.com">Intemento@gmail.com</a> 
			</p>

	</div>
</html>