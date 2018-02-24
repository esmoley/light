<?php if($secret!="afuhznkxjcvnkjasdgihgkjrweqqwr")die();
	class Computer{
		public $mac;
		public $db;
		function __construct($db,$respond){
			$this->mac = $_REQUEST['mac'];
			$this->db = $db;
			if($this->mac=="")$respond->error("wrong mac");
			
			/*$query = "select *, TIMESTAMPDIFF(SECOND,last_update,now()) as last_updatePASSED
			from ".DB_COMPUTERS."
			where login='$login' and passw='$passw' limit 1 ";

			$result = mysqli_query($conn, $query);
			if (mysqli_num_rows($result) > 0) {
				if($pc = mysqli_fetch_assoc($result)){
					
				}
			}*/
		} 
	}
?>