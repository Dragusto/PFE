<!DOCTYPE html>

<html>

    <head>

        <title>Intemento</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link href="css/indexcss.css" rel="stylesheet" type="text/css" />
		<h1>Intemento</h1>

        <h2>Connection Utilisateur</h2>

    </head>

    <body>

        
        <p>Veuillez vous identifier<br /></p>

        <!-- Ceci permet d'afficher les champs non remplis sans changer de page -->
        <?php
		if(isset($_GET["error_message"]))
			{
			  $error_message = $_GET["error_message"];
		?>
		
		<p style = "color : red"> <?php echo $error_message; ?></p>
		  
		<?php } ?>


		<?php
          if(isset($_GET["error_message1"]))
			{
			  $error_message1 = $_GET["error_message1"];
		?>
		
		<p style = "color : red"> <?php echo $error_message1; ?></p>
		  
		<?php } ?>

        <form action="indextraitement.php" method="post">

            <div class="table">
            <table id="myTable">

            <tr>
              <td>Email:</td>
              <td><input type="text" name="email"></td>
            </tr>

            <tr>
              <td>Mot de passe:</td>
              <td><input type="password" name="mdp"></td>
            </tr>       
              
            <tr>
              <td colspan="10"><input type="submit" value="Me connecter"></td>
			  <a href="sommaire.php"></a>
            </tr>
			
            </table>
            </div>
        </form>

    </body>

    <div class="inscription">
		
        <form action="inscription.php" method="post">
		
        <tr>
              <td colspan="10"><input type="submit" value="M'inscrire"></td>
        </tr>
		
        </form>
	
    </div>

     <div class="index">
        
        <form action="indexpro.php">
        
        <tr>
              <td colspan="10"><input type="submit" value="Version Entreprise"></td>
        </tr>
        
    </form>
    
    </div>
	
    <div id="footer">



    </div>
			
</html>