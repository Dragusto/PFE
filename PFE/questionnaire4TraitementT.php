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

$sql = "SELECT  * FROM questionnaire WHERE id = '$id'";
$tab = mysqli_query($db_handle, $sql);
$row = mysqli_fetch_array($tab);
$r1 = $row['q1'];
$r2 = $row['q2'];
$r3 = $row['q3'];
$r4 = $row['q4'];


$image = imagecreatefrompng("test/0.png");
$bleu = imagecolorallocate($image, 15, 26, 227);
$rouge = imagecolorallocate($image, 227, 26, 15); 

// 51x13 px  148x36 px cadre de 97x 23px milieu : 97x....
if ($r1<=450){$introverti = $r1;$extraverti = 900 - $r1;}
else{ $introverti = 900 - $r1; $extraverti = $r1;}
// 51x63 px  148x87 px
if ($r2<=450){$sensation = $r2;$intuition = 900 - $r2;}
else{ $sensation = 900 - $r2; $intuition = $r2;}
// 51x114 px  148x137 px
if ($r3<=450){$organiser = $r3;$adaptation = 900 - $r3;}
else{ $organiser = 900 - $r3; $adaptation = $r3;}
// 51x164px  148x186 px
if ($r4<=450){$empathique = $r4;$logique = 900 - $r4;}
else{ $empathique = 900 - $r4; $logique = $r4;}

// intraverti - Extraverti
$x1 = 51;
$y1 = 13;

$x2 = $x1 + ($introverti* 97)/900 +1;
$y2 = 36;

$x3 = 148;
$y3 = 36;
imagefilledrectangle($image, $x2, $y1, $x3, $y3, $rouge);
imagefilledrectangle($image, $x1, $y1, $x2, $y2, $bleu);

// Sensation - Intuition
$x4 = 51;
$y4 = 63;

$x5 = $x4 + ($sensation*97)/900+1;
$y5 = 87;

$x6 = 148;
$y6 = 87;
imagefilledrectangle($image, $x5, $y4, $x6, $y6, $rouge);
imagefilledrectangle($image, $x4, $y4, $x5, $y5, $bleu);

// Organiser - Adaptation
$x7 = 51;
$y7 = 114;

$x8 = $x7 + ($organiser*97)/900+1;
$y8 = 137;

$x9 = 148;
$y9 = 137;
imagefilledrectangle($image, $x8, $y7, $x9, $y9, $rouge);
imagefilledrectangle($image, $x7, $y7, $x8, $y8, $bleu);

// Empathique - Logique
$x10 = 51;
$y10 = 164;

$x11 = $x10+($empathique* 97)/900+1;
$y11 = 186;

$x12 = 148;
$y12 = 186;
imagefilledrectangle($image, $x11, $y10, $x12, $y12, $rouge);
imagefilledrectangle($image, $x10, $y10, $x11, $y11, $bleu);



// Si une photo existe deja pour le profil
if(is_file("test/$id.jpg"))
{
	unlink("test/$id.jpg");
}

imagepng($image,"test/$id.png");




?>
<meta http-equiv="refresh" content="1;vous.php"/>
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