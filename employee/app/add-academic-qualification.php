<?php
require '../../constants/db_config.php';
require '../constants/check-login.php';
$country  = $_POST['country'];
$course = ucwords($_POST['course']);
$institution = ucwords($_POST['institution']);
$timeframe = ucwords($_POST['timeframe']);
$level  = $_POST['level'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("INSERT INTO tbl_academic_qualification (member_no, country, institution, course, level, timeframe) VALUES 
(:member, :country, :institution, :course, :level, :timeframe)");
$stmt->bindParam(':member', $myid);
$stmt->bindParam(':country', $country);
$stmt->bindParam(':institution', $institution);
$stmt->bindParam(':course', $course);
$stmt->bindParam(':level', $level);
$stmt->bindParam(':timeframe', $timeframe);
$stmt->execute();
header("location:../qualifications.php?r=2303");					  
}catch(PDOException $e)
{

}

}

}
	


?>