<?php 

if (isset($_POST['update_name'])) {
	$pword = $_POST['pword'];
	$Update = mysqli_query($conn,"UPDATE tbl_login SET pword = '$pword'");

	if ($Update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Successfuly Updated!');
			window.location.href='View.php';
			</SCRIPT>");
	}
}


?>