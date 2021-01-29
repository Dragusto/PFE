<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="css/indexcss.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<h2>Inscription Entreprise</h2>
	
	<?php
          if(isset($_GET["error_message"]))
          {
             $error_message = $_GET["error_message"];
        ?>
          <p style = "color : red"> 
          <?php echo $error_message; ?>
          </p>
        <?php
          }
		?>
		
	<form action="inscriptionTraitementpro.php" method="post">

		<table id="ma Table">

			<tr>
				<td>Nom : </td>
				<td><input type="text" name="nom"/></td>
			</tr>

			<tr>
				<td>Siren : </td>
				<td><input type="text" name="prenom"/></td>
			</tr>

			<tr>
				<td>Adresse mail : </td>
				<td><input type="text" name="email"/></td>
			</tr>

			<tr>
				<td>Mot de passe : </td>
				<td><input type="password" name="mdp"></td>
			</tr>

			<tr>
				<td> Confirmer mot de passe : </td>
				<td><input type="password" name="mdp1"></td>
			</tr>
			
			<tr>
				<td colspan="2"><input type="Submit" value="S'inscrire"/></td>
			</tr>

		</table>
			
			<p>En cliquant sur S’inscrire, vous acceptez nos <a href="CGU.php">Conditions générales</a>. Découvrez comment nous recueillons, utilisons et partageons vos données en lisant notre Politique d’utilisation des données et comment nous utilisons les cookies et autres technologies similaires en consultant notre Politique d’utilisation des cookies</p>
			
	</form>

	<div id="indexpro">

		<p> J'ai déjà un compte ? </p>

		<form action="indexpro.php" method="post">

			<tr>
				<td colspan="2"> <input type="submit" value="Me connecter"></td>
			</tr>

		</form>

	</div>

</body>

<div id="footer">Intemento</p> 



</div>

</html>