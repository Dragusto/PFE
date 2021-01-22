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
		<a href="questionnaire2.php"><td colspan="2"><input type="submit" value="page précédente"></td></a>
	</tr>

	<form enctype="multipart/form-data" action="questionnaire3Traitement.php" method="post">
		<!-- Question 1 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous aimez organiser et planifier : <br> <br>
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
					Vous êtes sérieux et conventionnel : <br> <br>
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
					Vous aimez démarrer des projets : <br> <br>
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
					Vous vous amusez d’abord et travaillez ensuite : <br> <br>
						<input type="radio" name="q4" value="10" checked> Tout à fait d'accord<br>
						<input type="radio" name="q4" value="30"> D'accord<br>
						<input type="radio" name="q4" value="50"> neutre<br>
						<input type="radio" name="q4" value="70"> En désaccord <br>
						<input type="radio" name="q4" value="90"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 5 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous n’aimez pas le stress de dernière minute : <br> <br>
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
					Vous ne discutez pas les règles : <br> <br>
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
					Vous cherchez à comprendre : <br> <br>
						<input type="radio" name="q7" value="10" checked> Tout à fait d'accord<br>
						<input type="radio" name="q7" value="30"> D'accord<br>
						<input type="radio" name="q7" value="50"> neutre<br>
						<input type="radio" name="q7" value="70"> En désaccord <br>
						<input type="radio" name="q7" value="90"> Totalement en désaccord<br>
					</tr>
				</table>
			</p>
		</fieldset>
		<!-- Question 8 -->
		<fieldset>
			<p>
				<table>
					<tr>
					Vous êtes à l’aise au sein de structures bien définies  : <br> <br>
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
					Vous suivez votre calendrier et êtes parfaitement ponctuel : <br> <br>
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
		
			if(isset($_GET["error_message_questionnaire3"]))
			{
			  $error_message_questionnaire1 = $_GET["error_message_questionnaire3"];
		?>
		
		<p style = "color : red"> <?php echo $error_message_questionnaire3; ?></p>
		  
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