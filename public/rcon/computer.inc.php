<?php if($secret!="afuhznkxjcvnkjasdgihgkjrweqqwr")die();	
	$mac = getPost("mac");
    if($mac =="")errorArray(array("refresh","wrong mac"));
	$query = "select *, TIMESTAMPDIFF(SECOND,last_update,now()) as last_updatePASSED
	from ".DB_COMPUTERS."
	where login='$login' and passw='$passw' limit 1 ";

	$result = mysqli_query($conn, $query);
	if (mysqli_num_rows($result) > 0) {
		if($pc = mysqli_fetch_assoc($result)){
			
		}
	}
?>