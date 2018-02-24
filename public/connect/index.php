<?php $secret = "afuhznkxjcvnkjasdgihgkjrweqqwr";

require_once ("inc/respond.php");
require_once ("inc/db.php");
require_once ("inc/computer.php");

$respond = new Respond();
$db = new DB($respond);
$computer = new Computer($db,$respond);
?>