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
 <?php
      if( !empty($message) ) 
      {
        echo '<p>',"\n";
        echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
        echo "\t</p>\n\n";
      }
     if ($birth){}
	 else
	 {?>
	    <tr>
			<td colspan="2"><input type="submit" value="Retour profil"></td>
			<a href="vous.php"></a>
		</tr>
	
	<form enctype="multipart/form-data" action="parametreBirth.php" method="post">
    <fieldset>
		<p>
		<table>
            <tr>
				<td><label>Jour : </label></td>
				<td><input type="number" name="day"></td>
			</tr>
			<tr><td> Mois :</td> 
				<td><label><select name="date" style="font-size:16px">
					<option value="date1">Janvier</option>
					<option value="date2">Février</option>
					<option value="date3">Mars</option>
					<option value="date4">Avril</option>
					<option value="date5">Mai</option>
					<option value="date6">Juin</option>
					<option value="date7">Juillet</option>
					<option value="date8">Août</option>
					<option value="date9">Septempbre</option>
					<option value="date10">Octobre</option>
					<option value="date11">Novembre</option>
					<option value="date12">Décembre</option>
			  </select></label></td>
			</tr> 
			<tr>
				<td><label>Année : </label></td>
				<td><input type="number" name="year"></td>
			</tr> 
			<tr>
				<td>Mot de passe : </td>
				<td><input type="password" name="mdp"</td>
			</tr>
			<tr>
				<td colspan="2"> <input type="submit" value="Ajouter date de naissance"></td>
			</tr>
		
		<?php
            if(isset($_GET["error_message5"]))
            {
              $error_message5 = $_GET["error_message5"];
        ?>
        
        <p style = "color : red"> <?php echo $error_message5; ?></p>
          
        <?php } ?>
		<?php
            if(isset($_GET["message5"]))
            {
              $message5 = $_GET["message5"];
        ?>
        
        <p style = "color : green"> <?php echo $message5; ?></p>
          
        <?php } ?>
			</table>
		</p>
	  </fieldset>
    </form>
	<?php 
	} ?>
	<p>
	</p>
	
	   <form enctype="multipart/form-data" action="parametreImage.php" method="post">
    <fieldset>
          <p>
            <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Changer de photo de profil :</label>
            <input name="fichier" type="file" id="fichier_a_uploader" />
            <input type="submit" />
			<?php
            if(isset($_GET["error_message1"]))
            {
              $error_message1 = $_GET["error_message1"];
			?>
        
			<p style = "color : red"> <?php echo $error_message1; ?></p>
          
        <?php } ?>
		<?php
            if(isset($_GET["message1"]))
            {
              $message1 = $_GET["message1"];
        ?>
        
        <p style = "color : green"> <?php echo $message1; ?></p>
          
        <?php } ?>
          </p>
      </fieldset>
    </form>
	<p>
	</p>
	<form enctype="multipart/form-data" action="parametreEmail.php" method="post">
    <fieldset>
		<p>
           <table>
		   <tr>
				<td> <label>Adresse mail :</label> </td> 
				<td><input type="text" name="email1"/></td>
			</tr>
			<tr>
			<td><label>Nouvelle adresse mail : </label></td>
			<td>	<input type="text" name="email2"/></td>
			</tr>
			 <tr>
				<td>Mot de passe : </td>
				<td><input type="password" name="mdp"</td>
			</tr>
			<tr>
				<td colspan="2"> <input type="submit" value="Changer email"></td>
			</tr>
		
		<?php
            if(isset($_GET["error_message2"]))
            {
              $error_message2 = $_GET["error_message2"];
        ?>
        
        <p style = "color : red"> <?php echo $error_message2; ?></p>
          
        <?php } ?>
		<?php
            if(isset($_GET["message2"]))
            {
              $message2 = $_GET["message2"];
        ?>
        
        <p style = "color : green"> <?php echo $message2; ?></p>
          
        <?php } ?>
		</table>
		</p>
	  </fieldset>
    </form>
	<p>
	</p>
    <form enctype="multipart/form-data" action="parametreMDP.php" method="post">
    <fieldset>
		<p>
		<table>
            <tr>
				<td><label>Mot de passe : </label></td>
				<td><input type="password" name="mdp"></td>
			<tr>
				<td><label>Nouveau mot de passe : </label></td>
				<td><input type="password" name="mdp1"></td>
			</tr> 
			<tr>
				<td><label>Confirmer nouveau mot de passe : </label></td>
				<td><input type="password" name="mdp2"></td>
			</tr> 
			<tr>
				<td colspan="2"> <input type="submit" value="Changer de mot de passe"></td>
			</tr>
		
		<?php
            if(isset($_GET["error_message"]))
            {
              $error_message = $_GET["error_message"];
        ?>
        
        <p style = "color : red"> <?php echo $error_message; ?></p>
          
        <?php } ?>
		<?php
            if(isset($_GET["message"]))
            {
              $message = $_GET["message"];
        ?>
        
        <p style = "color : green"> <?php echo $message; ?></p>
          
        <?php } ?>
			</table>
		</p>
	  </fieldset>
    </form>
	
	<p>
	</p>

	<form enctype="multipart/form-data" action="parametreTravail.php" method="post">
    <fieldset>
		<p>
		<table>
            <tr>
				<td><label>Veuillez renseigner votre statut : </label></td>
				<td><input type="text" name="statut"/></td>
             </tr>
			 <tr>
				<td><label>Mot de passe : </label></td>
				<td><input type="password" name="mdp"></td>
			</tr> 
			<tr>
				<td colspan="2"> <input type="submit" value="Changer statut"></td>
			</tr>
				
		
		<?php
            if(isset($_GET["error_message5"]))
            {
              $error_message5 = $_GET["error_message5"];
        ?>
        
        <p style = "color : red"> <?php echo $error_message5; ?></p>
          
        <?php } ?>
		<?php
            if(isset($_GET["message5"]))
            {
              $message5 = $_GET["message5"];
        ?>
        
        <p style = "color : green"> <?php echo $message5; ?></p>
          
        <?php } ?>
		</table>
		</p>
	  </fieldset>
    </form>
	
	<p>
	</p>

	<form enctype="multipart/form-data" action="parametreAdresse.php" method="post">
    <fieldset>
		<p>
		<table>
            <tr>
				<td><label>Numéro : </label></td>
				<td><input type="text" name="num"/></td>
			</tr> 
			<tr>
				<td><label>Rue, bd, etc. : </label></td>
				<td><input type="text" name="rue"/></td>
			</tr> 
			<tr>
				<td><label>Ville : </label></td>
				<td><input type="text" name="city"/></td>
			</tr> 
			<tr>
				<td><label>Code Postal : </label></td>
				<td><input type="text" name="post"/></td>
			</tr> 
			<tr>
				<td><label>Mot de passe : </label></td>
				<td><input type="password" name="mdp"></td>
			</tr> 
			<tr>
				<td colspan="2"> <input type="submit" value="Changer adresse"></td>
			</tr>
		
		<?php
            if(isset($_GET["error_message3"]))
            {
              $error_message3 = $_GET["error_message3"];
        ?>
        
        <p style = "color : red"> <?php echo $error_message3; ?></p>
          
        <?php } ?>
		<?php
            if(isset($_GET["message3"]))
            {
              $message3 = $_GET["message3"];
        ?>
        
        <p style = "color : green"> <?php echo $message3; ?></p>
          
        <?php } ?>
		</table>
		</p>
	  </fieldset>
    </form>
	<p>
	</p>
	
	   <form enctype="multipart/form-data" action="parametreCV.php" method="post">
    <fieldset>
          <p>
            <label for="CV_uploader" title="Recherchez le CV à uploader !">Curiculum Vitae :</label>
            <input name="fichier" type="file" id="fichier_a_uploader" />
            <input type="submit" name="submit" value="Uploader" />
			<?php
            if(isset($_GET["error_message6"]))
            {
              $error_message6 = $_GET["error_message6"];
			?>
        
			<p style = "color : red"> <?php echo $error_message6; ?></p>
          
        <?php } ?>
		<?php
            if(isset($_GET["message6"]))
            {
              $message6 = $_GET["message6"];
        ?>
        
        <p style = "color : green"> <?php echo $message6; ?></p>
          
        <?php } ?>
          </p>
      </fieldset>
    </form>
  </body>
    <div id="footer">
        <p>Droit d'auteur Giot Chabennet © 2018 Intemento</p> 
        <p> Dernière mise à jour le 2/05/2018 |
        <a href="mailto:Intemento@gmail.com">Intemento@gmail.com</a>       
    </div>
</html>