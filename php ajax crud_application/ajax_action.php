<?php 
	include "config.php";

	// Check if 'chkid' is set in the $_POST array
	if(isset($_POST["chkid"])) {
		$chkid = intval($_POST["chkid"]); // Convert chkid to integer
	} else {
		$chkid = 0; // Default value if 'chkid' is not set
	}

	$uid = $_POST["uid"];
	$name = mysqli_real_escape_string($con, $_POST["name"]);
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$mobile = mysqli_real_escape_string($con, $_POST["mobile"]);
    
	if($uid == "0") {
		$sql = "INSERT INTO user (NAME, EMAIL, MOBILE, CHKID) VALUES ('{$name}', '{$email}', '{$mobile}', {$chkid})";
		if($con->query($sql)) {
			$uid = $con->insert_id;
			echo "<tr class='{$uid}'>
                                
				<td>{$chkid}</td>
				<td>{$name}</td>
				<td>{$email}</td>
				<td>{$mobile}</td>
				<td><a href='#' class='btn btn-primary edit' uid='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' uid='{$uid}'>Delete</a></td>					
			</tr>";
		}
	} else {
		$sql = "UPDATE user SET NAME='{$name}', EMAIL='{$email}', MOBILE='{$mobile}', CHKID={$chkid} WHERE UID='{$uid}'";
		if($con->query($sql)) {
			echo "
				<td>{$name}</td>
				<td>{$email}</td>
				<td>{$mobile}</td>
				<td>{$chkid}</td>
				<td><a href='#' class='btn btn-primary edit' uid='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' uid='{$uid}'>Delete</a></td>					
			";
		}
	}
?>
