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
	$birth = $row['date_de_naissance'];
?>
<head>
	<title>Changement de données</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="css/vouscss.css" media="screen" type="text/css">
</head>
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
<body>

 	<tr>
		<a href="vous.php"><td colspan="2"><input type="submit" value="Retour profil"></td></a>
	</tr>

	<form enctype="multipart/form-data" action="questionnaire1Traitement.php" method="post">
		<!-- Question 1 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous êtes plutôt dynamique que calme : <br> <br>
						<input type="radio" name="q1" value="90" checked> Tout à fait d'accord<br>
						<input type="radio" name="q1" value="70"> D'accord<br>
						<input type="radio" name="q1" value="50"> neutre<br>
						<input type="radio" name="q1" value="30"> En désaccord <br>
						<input type="radio" name="q1" value="10"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 2 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous aimez parler plus qu'écouter : <br> <br>
						<input type="radio" name="q2" value="90" checked> Tout à fait d'accord<br>
						<input type="radio" name="q2" value="70"> D'accord<br>
						<input type="radio" name="q2" value="50"> neutre<br>
						<input type="radio" name="q2" value="30"> En désaccord <br>
						<input type="radio" name="q2" value="10"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 3 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous réfléchissez posément : <br> <br>
						<input type="radio" name="q3" value="10" checked> Tout à fait d'accord<br>
						<input type="radio" name="q3" value="30"> D'accord<br>
						<input type="radio" name="q3" value="50"> neutre<br>
						<input type="radio" name="q3" value="70"> En désaccord <br>
						<input type="radio" name="q3" value="90"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 4 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous agissez puis vous pensez : <br> <br>
						<input type="radio" name="q4" value="90" checked> Tout à fait d'accord<br>
						<input type="radio" name="q4" value="70"> D'accord<br>
						<input type="radio" name="q4" value="50"> neutre<br>
						<input type="radio" name="q4" value="30"> En désaccord <br>
						<input type="radio" name="q4" value="10"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 5 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous n’aimez pas être seul : <br> <br>
						<input type="radio" name="q5" value="90" checked> Tout à fait d'accord<br>
						<input type="radio" name="q5" value="70"> D'accord<br>
						<input type="radio" name="q5" value="50"> neutre<br>
						<input type="radio" name="q5" value="30"> En désaccord <br>
						<input type="radio" name="q5" value="10"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 6 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous aimez établir de nouveaux contact plus qu’approfondir vos contacts existant : <br> <br>
						<input type="radio" name="q6" value="90" checked> Tout à fait d'accord<br>
						<input type="radio" name="q6" value="70"> D'accord<br>
						<input type="radio" name="q6" value="50"> neutre<br>
						<input type="radio" name="q6" value="30"> En désaccord <br>
						<input type="radio" name="q6" value="10"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 7 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous préférez parler plutôt qu’écrire : <br> <br>
						<input type="radio" name="q7" value="90" checked> Tout à fait d'accord<br>
						<input type="radio" name="q7" value="70"> D'accord<br>
						<input type="radio" name="q7" value="50"> neutre<br>
						<input type="radio" name="q7" value="30"> En désaccord <br>
						<input type="radio" name="q7" value="10"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 8 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous possédez une bonne capacité de réflexion : <br> <br>
						<input type="radio" name="q8" value="90" checked> Tout à fait d'accord<br>
						<input type="radio" name="q8" value="70"> D'accord<br>
						<input type="radio" name="q8" value="50"> neutre<br>
						<input type="radio" name="q8" value="30"> En désaccord <br>
						<input type="radio" name="q8" value="10"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 9 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous préférez vous concentrer sur une seule chose à la fois plutôt que de faire plusieur chose à la fois : <br> <br>
						<input type="radio" name="q9" value="90"> Tout à fait d'accord<br>
						<input type="radio" name="q9" value="70"> D'accord<br>
						<input type="radio" name="q9" value="50"> neutre<br>
						<input type="radio" name="q9" value="30"> En désaccord <br>
						<input type="radio" name="q9" value="10"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		
				  
		<?php 
		
			if(isset($_GET["error_message_questionnaire1"]))
			{
			  $error_message_questionnaire1 = $_GET["error_message_questionnaire1"];
		?>
		
		<p style = "color : red"> <?php echo $error_message_questionnaire1; ?></p>
		  
		<?php } ?>
	
		  
		</table>
		</p>
	  </fieldset>
	  	<tr>
			<td colspan="2"> <input type="submit" value="Suivant"></td>
		</tr>
	</form>
</body>

</html>