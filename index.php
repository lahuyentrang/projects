<?php 
session_start();

include ('includes/check_authentication.php');
include ('includes/connect_db.php');

$user = $_SESSION['user'];
$username = $user['Username'];
$sql = "SELECT * FROM userprofile WHERE username='$username'";
$result = $conn->query($sql);
$profile = $result->fetch();
?>

<!DOCTYPE html>
<html>
<head>
	<title>practice1</title>
	<style type="text/css">
	body{
		background-color: #9999FF;
	}
</style>
</head>
<body>
	<table>
		<tr>
			<th>username</th>
			<th>avatar</th>
		</tr>
		<tr>
			<td><?php echo $profile['Username']; ?></td>
			<td><?php echo $profile['Avatar']; ?></td>
		</tr>
	</table>
</body>
</html>
