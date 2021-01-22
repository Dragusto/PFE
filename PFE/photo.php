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
?>

	<head>
       
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" href="css/photocss.css" media="screen" type="text/css">
    </head>
		<!-- Here is the menu area -->
	<header>
        <div class="titre">
            <h1>ECE Connect</h1>     
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
	
	<body>
	<section>
		<p>
			<?php
				$sql = " SELECT nom_photo FROM photo WHERE id = '$id'";
				$tab = mysqli_query($db_handle, $sql);

				$row = mysqli_fetch_assoc($tab);
				$nom_photo = array();
				
				
				while($row = mysqli_fetch_assoc($tab))
				{
					$nom_photo[$row['nom_photo']] = $row['nom_photo'];	
					
				}  
				foreach($nom_photo as $photo)
				{
				
					$new_photo = substr($photo, 0, -4);
				?>
					<p><img src = <?php echo $id.'/'.$new_photo;?> ></p>
				<?php } ?>
		</p>
	</section>
	<div class='photo'>
        <form method="post" action="" enctype="multipart/form-data">
			<p><input type="file" name="uploaded_files[]" multiple /></p>
			<p><input type="submit" /></p>
		</form>
	</div>
	
	</body>
	<?php
	$tabExt = array('jpg','gif','png','jpeg'); 
	$extension = '';
	
	if( !is_dir($id.'/') ) {
		if( !mkdir($id.'/', 0755) ) 
		{
			exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
		} 
	}
	if(isset($_FILES['uploaded_files'])) { // Si le formulaire est envoyé
		foreach($_FILES['uploaded_files']['name'] as $clef => $error) // On traite le tableau retourné par file
		{
			if ($error == UPLOAD_ERR_OK) 
			{
				$tmp_name = $_FILES["uploaded_files"]["tmp_name"][$clef];
				$name = $_FILES["uploaded_files"]["name"][$clef];
				echo "zert";
				if(move_uploaded_file($tmp_name, $id.'/'.$name))
				{
					echo "zertyuiop";
					$sql = "INSERT INTO photo(id, nom_photo) VALUES ('$id', '$name')";
					if(mysqli_query($db_handle, $sql))
					{
						
					}
					else{echo "fghj";}
				}
			}
		}
	}
	?>
	
	
</html>