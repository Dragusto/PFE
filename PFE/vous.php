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

$sql10 = "SELECT * FROM utilisateur WHERE id = '$id'";
$tab1 = mysqli_query($db_handle, $sql10);
$row1= mysqli_fetch_array($tab1);
$entreprise = $row1['entreprise'];

// $sql = "SELECT id_1 FROM relation WHERE id_1 = '$id' or id_2 = '$id' GROUP BY id_1 ";
// $tab1 = mysqli_query($db_handle, $sql);
// $row1 = mysqli_fetch_array($tab1);

// $nb_relation = count($row1);


?>

<head>
       
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="css/vouscss.css" media="screen" type="text/css">
</head>
		<!-- Here is the menu area -->
<header>
		<div class="titre">
	        <p><img class="testimg2"src= "image/intemento" ></p>    
	    </div>
	<nav>
		<ul>
			<a href="sommaire.php">Acceuil </a>
			<!-- <a href="reseau.php">Reseau </a> -->
			<a href="emploi.php">Emploi </a>
			<!-- <a href="messagerie.php">Messagerie </a> -->
			<!-- <a href="notification.php">Notification </a> -->
			<a href="vous.php">Profil </a>
		</ul>
	</nav>
		
</header>

<div class="pr">
	<p><a href="parametre.php">Paramètre</a></p>
	<?php  if ($entreprise==1){}else{
	$chemin = 'CV/'.$id.'.pdf';
	if (is_file($chemin))
	{?>
	<p><a href="CV/<?php echo $id.".pdf";?>">Curriculum vitae</a></p>
	<?php } ?>
	<!-- <p><a href="reseau.php">Relation(<?php echo $nb_relation ?>)</a></p> -->
	<p><a href="questionnaire1.php">Questionnaire</a></p>
	<?php }?>
	<p><a href="photo.php">Photos</a></p>
</div>

<div class="right">

			
	<p> Nom : <?php echo $nom; ?> </p>
	<p><?php if ($entreprise==1){}else{echo 'Prénom : '.$prenom;}?></p>
	<?php if(!$adresse){}else{echo 'Adresse : '.$adresse; } ?><p> </p>
	<?php if(!$job){}else{ echo 'Statut : '.$job;} ?><p> </p>
	<?php if(!$birth){}else{ echo 'Date de naissance : '.$birth;} ?><p> </p>
	<?php
	if ($entreprise==1){}else{
	$chemin1 = "test/$id.png";
	if (is_file($chemin1))
	{?>
	<p><img src = test/<?php echo $id;?> width="200" height="200" alt="A 200x200 image"></p>
	<a href="resultat.php">Résultat </a>
	<?php } 
	else
	{?>
	<p> Pas encore effectuer de test </p>
	<?php }} ?>
</div>
<?php
		$chemin2 = "profil/$id.jpg";
		if (is_file($chemin2))
		{?>
		<p>	<img class="testimg" src=profil/<?php echo $id;?> > </div></p>
		<?php } 
		else
		{?>
			<p><img class="testimg"src= "profil/0"></p>
		<?php } ?>

<div class="publi">
			<form enctype="multipart/form-data" action="vousTraitement.php" method="post">

				<table id="publication">

					<tr>
						<td>Information  : </td>
						<td><input type="text" name="info" required size="100" colspan="4"/></td>
				
					<tr>
						<td colspan="2"><input type="Submit" value="Publier"/></td>
					</tr>

				</table>

			</form>
</div>
<div id="publication">	
		<?php
			$sql = "SELECT * FROM membre WHERE id = '$id'";
			$result = mysqli_query($db_handle, $sql);
				while($data = mysqli_fetch_assoc($result))		
			{		
				?>
				<form enctype="multipart/form-data">
				<?php
				echo $data['info'].'<br>';
				}
			?>
</div>

	
	<div id="footer">


	</div>
</html>