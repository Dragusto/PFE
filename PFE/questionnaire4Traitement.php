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
	Redirect("questionnaire4.php?error_message_questionnaire4="."Merci de cocher une case par question", false);
}else
{
	$sql1 = "DELETE FROM question4 WHERE id = '$id'";
	mysqli_query($db_handle, $sql1);
	
	$sql2 = "INSERT INTO question4 (`id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`) VALUES ('$id', '$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9')";
			
	mysqli_query($db_handle, $sql2);
	
	$sql3 = "DELETE FROM questionnaire WHERE id = '$id'";
	mysqli_query($db_handle, $sql3);

	$sql4 = "SELECT  `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9` FROM question1 WHERE id = '$id'";
	$tab1 = mysqli_query($db_handle, $sql4);
	$row1 = mysqli_fetch_array($tab1);
	$q1 = $row1['q1'];
	$q2 = $row1['q2'];
	$q3 = $row1['q3'];
	$q4 = $row1['q4'];
	$q5 = $row1['q5'];
	$q6 = $row1['q6'];
	$q7 = $row1['q7'];
	$q8 = $row1['q8'];
	$q9 = $row1['q9'];
	$question1 = $q1+$q2+$q3+$q4+$q5+$q6+$q7+$q8+$q9;

	$sql5 = "SELECT  `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9` FROM question2 WHERE id = '$id'";
	$tab2 = mysqli_query($db_handle, $sql5);
	$row2 = mysqli_fetch_array($tab2);
	$q1 = $row2['q1'];
	$q2 = $row2['q2'];
	$q3 = $row2['q3'];
	$q4 = $row2['q4'];
	$q5 = $row2['q5'];
	$q6 = $row2['q6'];
	$q7 = $row2['q7'];
	$q8 = $row2['q8'];
	$q9 = $row2['q9'];
	$question2 = $q1+$q2+$q3+$q4+$q5+$q6+$q7+$q8+$q9;

	$sql6 = "SELECT  `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9` FROM question3 WHERE id = '$id'"; 
	$tab3 = mysqli_query($db_handle, $sql6);
	$row3 = mysqli_fetch_array($tab3);
	$q1 = $row3['q1'];
	$q2 = $row3['q2'];
	$q3 = $row3['q3'];
	$q4 = $row3['q4'];
	$q5 = $row3['q5'];
	$q6 = $row3['q6'];
	$q7 = $row3['q7'];
	$q8 = $row3['q8'];
	$q9 = $row3['q9'];
	$question3 = $q1+$q2+$q3+$q4+$q5+$q6+$q7+$q8+$q9;

	$sql7 = "SELECT  `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9` FROM question4 WHERE id = '$id'";
	$tab4 = mysqli_query($db_handle, $sql7);
	$row4 = mysqli_fetch_array($tab4);
	$q1 = $row4['q1'];
	$q2 = $row4['q2'];
	$q3 = $row4['q3'];
	$q4 = $row4['q4'];
	$q5 = $row4['q5'];
	$q6 = $row4['q6'];
	$q7 = $row4['q7'];
	$q8 = $row4['q8'];
	$q9 = $row4['q9'];
	$question4 = $q1+$q2+$q3+$q4+$q5+$q6+$q7+$q8+$q9;

	$sql8 = "INSERT INTO questionnaire (`id`, `q1`, `q2`, `q3`, `q4`) VALUES ('$id', '$question1', '$question2', '$question3', '$question4')";
	mysqli_query($db_handle, $sql8);
}


?>
	<meta http-equiv="refresh" content="1;questionnaire4TraitementT.php"/>
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