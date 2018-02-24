<?php if($secret!="afuhznkxjcvnkjasdgihgkjrweqqwr")die();
	class Center{
        private $db;
        public $info;
        function __construct($db,$respond){
            $this->db = $db;
            $this->info = get_center();
            if($this->info=="")$this->respond->error("WRONG_CLUB_PAIR");
        }
        function get_center(){
            return $this->db->get_one("select *
			from `center`
            where username_connect='".mysql_escape_string($_REQUEST['username_connect'])."'
            and username_password='".mysql_escape_string($_REQUEST['username_password'])."'");
        }
    }
?>