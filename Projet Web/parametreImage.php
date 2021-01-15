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


/*********************************Photo*********************************/ 
define('TARGET', 'profil/');    // Repertoire cible
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
 
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
if(!empty($_POST))
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $photo = $id.'.'.'jpg';
			// Si une photo existe deja pour le profil
			if(is_file(TARGET.$photo.'jpg'))
			{
				unlink(TARGET.$photo.'jpg');
			}
				// Si c'est OK, on teste l'upload
				if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$photo))
				{
					$message = 'Upload réussi !';
					bon("parametre.php?message1="."Upload réussi", false);
				}
				else
				{
				// Sinon on affiche une erreur systeme
					$message = 'Problème lors de l\'upload !';
					Redirect("parametre.php?error_message1="."Problème lors de l'upload !", false);
				}
							
          }
          else
          {
            $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
			Redirect("parametre.php?error_message1="."Une erreur interne a empêché l'uplaod de l'image", false);
          }      
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'L\'extension du fichier est incorrecte !';
	  Redirect("parametre.php?error_message1="."L'extension du fichier est incorrecte !", false);
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
	Redirect("parametre.php?error_message1="."Veuillez remplir le formulaire svp !", false);
  }
}
?>
				<meta http-equiv="refresh" content="1;parametre.php"/>
			<?php
			
		    function bon($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }		
		    function Redirect($url, $permanent = false)
    {
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
?>