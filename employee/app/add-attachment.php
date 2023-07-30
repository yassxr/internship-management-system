<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$title = ucwords($_POST['title']);
$issuer = ucwords($_POST['issuer']);
$Licence = addslashes(file_get_contents($_FILES['Licence']['tmp_name']));

if ($_FILES["Licence"]["size"] > 1000000) {
header("location:../attachments.php?r=2290");
}else{
	
try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("INSERT INTO tbl_other_attachments (member_no, title, issuer, attachment) VALUES ('$myid', :title, :issuer, '$Licence')");
$stmt->bindParam(':title', $title);
$stmt->bindParam(':issuer', $issuer);
$stmt->execute();
header("location:../attachments.php?r=6789");				  
}catch(PDOException $e)
{

}

	
}

?>
