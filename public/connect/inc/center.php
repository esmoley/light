<?php if($secret!="afuhznkxjcvnkjasdgihgkjrweqqwr")die();
	class Center{
        private $db;
        public $club;
        function __construct($db,$respond){
            $this->db = $db;
            $this->club = $this->db->get_one("select *
			from `center`
            where username_connect='".mysql_escape_string($_REQUEST['username_connect'])."'
            and username_password='".mysql_escape_string($_REQUEST['username_password'])."'");
            if($this->club=="")$this->respond->error("WRONG_CLUB_PAIR");
        }
        function get_club(){
			return $this->db->get_one("select *
			from `center`
            where username_connect='".mysql_escape_string($_REQUEST['username_connect'])."'
            and username_password='".mysql_escape_string($_REQUEST['username_password'])."'"
        );
		}
    }
?>