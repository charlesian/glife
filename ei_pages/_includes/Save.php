<?php 

if (isset($_POST['update_name'])) {
	$pword = $_POST['pword'];
	$id = $_POST['id'];
	$Update = mysqli_query($conn,"UPDATE tbl_login SET id = '$id'");

	if ($Update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Successfuly Updated!');
			window.location.href='View.php';
			</SCRIPT>");
	}
}


?>