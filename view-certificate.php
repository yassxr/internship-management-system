<html>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-stage - View Licence</title>

<link href="css/main.css" rel="stylesheet">
</head>

<body>
<?php
require 'constants/db_config.php';
$file_id = $_GET['id'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	
$stmt = $conn->prepare("SELECT * FROM tbl_professional_qualification WHERE id = :fileid");
$stmt->bindParam(':fileid', $file_id);
$stmt->execute();
$result = $stmt->fetchAll();

foreach($result as $row)
{
    $Licence = $row['Licence'];
	
	?>
	<div style="width:100%">
    <iframe  style="border:none;" src="ViewerJS/?title=Licence#<?php echo 'data:application/pdf;base64,'.base64_encode($Licence).'' ?>" height="100%" width="100%"></iframe>

    </div>

<?php
}

					  
}catch(PDOException $e)
{

}

?>
</body>

</html>