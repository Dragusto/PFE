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


/*********************************Mot De Passe*********************************/
$q1 = isset($_POST["q1"])? $_POST["q1"]:"";
$q2 = isset($_POST["q2"])? $_POST["q2"]:"";
$q3 = isset($_POST["q3"])? $_POST["q3"]:"";
$q4 = isset($_POST["q4"])? $_POST["q4"]:"";
$q5 = isset($_POST["q5"])? $_POST["q5"]:"";
$q6 = isset($_POST["q6"])? $_POST["q6"]:"";
$q7 = isset($_POST["q7"])? $_POST["q7"]:"";
$q8 = isset($_POST["q8"])? $_POST["q8"]:"";
$q9 = isset($_POST["q9"])? $_POST["q9"]:"";
	
		if(!$q1 or !$q2 or !$q3 or !$q4 or !$q5 or !$q6 or !$q7 or !$q8 or !$q9)
		{
			Redirect("questionnaire2.php?error_message_questionnaire2="."Merci de cocher une case par question", false);
		}else
		{
			$sql1 = "DELETE FROM question2 WHERE id = '$id'";
			mysqli_query($db_handle, $sql1);
			
			$sql2 = "INSERT INTO question2 (`id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`) VALUES ('$id', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9')";
					
			mysqli_query($db_handle, $sql2);
			
		}


?>
	<meta http-equiv="refresh" content="1;questionnaire3.php"/>
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
    }?>
</html>