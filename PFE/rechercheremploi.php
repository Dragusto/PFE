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
		$array_id_search = $_SESSION['search'];
		$sql = "SELECT * FROM membre WHERE id = '$id'";
		$tab = mysqli_query($db_handle, $sql);
		$row= mysqli_fetch_array($tab);
		$nom = $row['nom'];
		$prenom = $row['prenom'];
		$job = $row['travail'];

?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/recherchercss.css" rel="stylesheet" type="text/css" />
    </head>
	<header>
		<div class="titre">
	        <p><img class="testimg"src= "image/intemento" ></p>    
	    </div>
		<nav>
			<ul>
				<a href="sommaire.php">Accueil </a>
				<a href="emploi.php">Emploi </a>
				<a href="vous.php">Profil </a>
			</ul>
		</nav>

		<div class="rechercher">
			<form id="formulaire" action="rechercheremploiTraitement.php" method="post">
				<tr>
					<td><input onKeyPress="if(event.keyCode == 13) validerForm();" type="text" name="recherche" placeholder="rechercher un emploi"s></td>
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
		
		

	</header>

    <body>

<?php
		foreach($array_id_search as $id_search)
		{?> 
		 				<fieldset>
					<div id="maListe">

						<?php

							$sql_search = "SELECT * FROM emploi WHERE id = '$id_search'";
							$tab_search = mysqli_query($db_handle, $sql_search);
							$row_search = mysqli_fetch_array($tab_search);		
							{
								echo "Entreprise :		   ".$row_search['nom'].'<br>';	
								echo "Travail:             ".$row_search['travail'].'<br>';
								echo "Lieu:                ".$row_search['lieu'].'<br>';
								echo "Date de début:       ".$row_search['dateDebut'].'<br>';
								echo "Contrat:             ".$row_search['contrat'].'<br>';
								echo "Description:         ".$row_search['description'].'<br>';
								echo "Date de publication: ".$row_search['datePubli'].'<br>';
								echo "Contact: ".$row_search['contact'].'<br>';
								if($row_search['profil']!=''){echo "Profil recherché:	   ".$row_search['profil'].'<br><br>';}
								?><?php
							}
						?>
					</div>
				</fieldset> 

		<?php } ?> 
		
	<div id="footer">


    </div>
	
	</body>

<?php	function validerForm(){
    document.getElementById("rechercher").submit();
}?>
	
	
</html>