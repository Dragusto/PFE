<!DOCTYPE html>
<html>

	<head>

	    <title>Intemento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<!-- <link href="css/publiercss.css" rel="stylesheet" type="text/css" /> -->

	</head>

	<body>

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

		<form action="publierTraitement.php" method="post">

			<table id="publication">

				<tr>
					<td>Titre de l'evenement : </td>
					<td><input type="text" name="titre"/></td>
				</tr>

				<tr>
					<td>Date de l'evenement : </td>
					<td><input type="date" name="date1"/></td>
				</tr>

				<tr>
					<td>Date poste : </td>
					<td><input type="date" name="datep"/></td>
				</tr>

				<tr>
					<td>Heure poste : </td>
					<td><input type="number" name="heure"></td>
				</tr>

				<tr>
					<td colspan="2"><input type="Submit" value="Publier"/></td>
				</tr>

		</table>

	</form>


	</body>
</html>