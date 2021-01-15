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
$id_search = $_SESSION['id_search'];
$sql = "SELECT * FROM membre WHERE id = '$id_search'";
$tab = mysqli_query($db_handle, $sql);
$row= mysqli_fetch_array($tab);
$nom = $row['nom'];
$prenom = $row['prenom'];
$email = $row['email'];
$job = $row['travail'];
$birth = $row['date_de_naissance'];
$city = $row['ville'];
$adresse = $row['adresse'];


$sql = "SELECT admin FROM membre WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row2= mysqli_fetch_array($tab);
$admin = $row2['admin'];

$sql = "SELECT id_1 FROM relation WHERE id_1 = '$id_search' GROUP BY id_1 ";
$tab1 = mysqli_query($db_handle, $sql);
$row1 = mysqli_fetch_array($tab1);

$nb_relation = count($row1);
?>

<head>
        <title>Nom du projet</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/vouscss.css" media="screen" type="text/css">
    </head>
	<header>
		<div class="titre">
            <h1>Intemento</h1>     
        </div>
		<nav>
			<ul>
				<a href="sommaire.php">Accueil </a>
				<a href="reseau.php">Reseau </a>
				<a href="emploi.php">Emploi </a>
				<a href="messagerie.php">Messagerie </a>
				<a href="notification.php">Notification </a>
				<a href="vous.php">Profil </a>
				
				
			</ul>
		</nav>

	</header>
	<div class="pr">
		<?php 
		$chemin = 'CV/'.$id_search.'.pdf';
		if (is_file($chemin))
		{?>
		<p><a href="CV/<?php echo $id_search.".pdf";?>">Curriculum vitae</a></p>
		<?php } ?>
		<p><a href="rechercherelation.php">Relation(<?php echo $nb_relation ?>)</a></p>
		<p><a href="photo.php">Photos</a></p>
		
		
	</div>
	

	<div class="right">
		<?php
		$chemin1 = "profil/$id_search.jpg";
		if (is_file($chemin1))
		{?>
		<p><img src = profil/<?php echo $id_search;?>></p>
		<?php } 
		else
		{?>
			<p><img src = "profil/0"></p>
		<?php } ?>
		<p> Nom : <?php echo $nom; ?> </p>
		<p> Prénom : <?php echo $prenom; ?> </p>
		<?php if(!$adresse){}
		else{echo 'Adresse : '.$adresse; } ?><p> <p/><?php
		if(!$job){}
		else{ echo 'Statut : '.$job;}?><p> </p><?php
		if(!$birth){}
		else{ echo 'Date de naissance : '.$birth;}?><p> </p>
		
	</div>
	
	<div class="ajouter">
		<?php 
		$sql1 = "SELECT id_1, id_2 FROM relation WHERE id_1 = '$id' and id_2 = '$id_search'";
		$sql2 = "SELECT id_1, id_2 FROM relation WHERE id_1 = '$id_search' and id_2 = '$id'";
		$tab_sql1 = mysqli_query($db_handle, $sql1);
		$row_sql1 = mysqli_fetch_array($tab_sql1);
		$tab_sql2 = mysqli_query($db_handle, $sql2);
		$row_sql2 = mysqli_fetch_array($tab_sql2);

		if($row_sql1 xor $row_sql2)
		{	
		?>
			<form action="rechprofilTraitement.php" method="post">
				<td colspan='10'><input type='submit' value='Supprimer' name="suppr"></td>
			</form>
		 <?php	
		}
		else
		{
		?>
			<form action="rechprofilTraitement.php" method="post">
				<td colspan='10'><input type='submit' value='Ajouter' name="ajouter"></td>
			</form>
		<?php 
		} ?> 
	</div>
		
	<body>
		
		<section>
		<div id="titre2">
			<h2>Fil d'actualités du profil</h2>
			<?php
				$sql = "SELECT * FROM evenement WHERE auteur = '$id_search'";
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
					<form action="profilsearchliker.php" method="post">
						<tr>
							<td> <input type="submit" value="liker"\> </td>
							<?php $_SESSION['id_evenement_search'] = $data['id_evenement']; ?>
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

			<p>Droit d'auteur © 2018 Nom du projet</p> 
			<p> Dernière mise à jour le 30/04/2018 | 
				<a href="mailto:nomDuProjet@gmail.com">nomDuProjet@gmail.com</a> 
			</p>

	</div>
	<?php if($admin)
	{?>
	<div class="admin">
		<form action="supprimerTraitement.php" method="post">
				<?php $_SESSION['id_suppr'] = $id_search; ?>
				<td colspan='10'><input type='submit' value='Supprimer' name="supprimer"></td>
		</form>
	</div>
	<?php } ?>
</html>