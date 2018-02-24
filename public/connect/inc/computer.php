<?php if($secret!="afuhznkxjcvnkjasdgihgkjrweqqwr")die();
	class Computer{
		private $db;
		private $respond;
		function __construct($db,$respond){
			$this->db = $db;
			$this->respond = $respond;
			if($_REQUEST['mac']=="")$this->respond->error("WRONG_MAC");
			
			/*$query = "select *, TIMESTAMPDIFF(SECOND,last_update,now()) as last_updatePASSED
			from ".DB_COMPUTERS."
			where login='$login' and passw='$passw' limit 1 ";

			$result = mysqli_query($conn, $query);
			if (mysqli_num_rows($result) > 0) {
				if($pc = mysqli_fetch_assoc($result)){
					
				}
			}*/
		}
		function get_current(){
			return $this->db->get_one("select *, TIMESTAMPDIFF(SECOND,last_update,now()) as last_updatePASSED
			from `computers`
			where mac='".mysql_escape_string($_REQUEST['mac'])."'");
		}
	}
?>