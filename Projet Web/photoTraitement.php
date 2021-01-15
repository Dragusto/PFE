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



/*********************************Photo*********************************/ 
define('TARGET', $id.'/');    // Repertoire cible
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg', 'mp4');    // Extensions autorisees
 
// Variables
$extension = '';
$message = '';
$photo = '';

/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if( !is_dir(TARGET) ) {
  if( !mkdir(TARGET, 0755) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
  } 
}

/************************************************************
 * Script d'upload
 *************************************************************/
if(isset($_FILES['uploaded_files'])) 
{
	echo "ijn";
    foreach($_FILES['uploaded_files']['name'] as $file => $error) // On traite le tableau retourné par file
    {
		echo "vgbhnj,k;l";
		if ($error == UPLOAD_ERR_OK) 
		{
			$tmp_name = $_FILES["uploaded_files"]["tmp_name"][$file];
			$name = $_FILES["uploaded_files"]["name"][$file];
			
			echo "dfghj";
			
			if(move_uploaded_file($tmp_name, TARGET.$name))
			{
				echo "cv";
				$sql = " INSERT INTO photo(id, nom_photo) VALUES ('$id', '$name')";
				mysqli_query($db_handle, $sql);				
			}
		}
    }
}
?>
				
			<?php
			
		  
?>