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
    exit('Erreur : le r�pertoire cible ne peut-�tre cr�� ! V�rifiez que vous diposiez des droits suffisants pour le faire ou cr�ez le manuellement !');
  } 
}

/************************************************************
 * Script d'upload
 *************************************************************/


    foreach($_FILES['uploaded_files']['name'] as $file => $error) // On traite le tableau retourn� par file
    {

		if ($error == UPLOAD_ERR_OK) 
		{
			$tmp_name = $_FILES["uploaded_files"]["tmp_name"][$file];
			$name = $_FILES["uploaded_files"]["name"][$file];
			

			
			if(move_uploaded_file($tmp_name, TARGET.$name))

				$sql = " INSERT INTO photo(id, nom_photo) VALUES ('$id', '$name')";
				mysqli_query($db_handle, $sql);				
			}
		}
    }

?>
				
			<?php
			
		  
?>