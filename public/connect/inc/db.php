<?php if($secret!="afuhznkxjcvnkjasdgihgkjrweqqwr")die();

class DB{
    public $users_table = 'users_club';
    public $computers_table = 'computers';
    private $conn;
    function __construct($respond){
        $this->conn = new mysqli('localhost', 'root', 'HanSolo55911', 'light');
        if(! $this->conn ) {         $respond->error("db");     }
    }
    function get_one($query){
        $result = mysqli_query($this->conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
    }

}

?>