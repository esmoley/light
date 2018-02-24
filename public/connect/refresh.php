<?php 
$secret = "afuhznkxjcvnkjasdgihgkjrweqqwr";

require_once ("config.inc.php");
require_once ("print.inc.php");
?>data<?php

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if(! $conn ) {         error("db");     }
	
	require_once ("computer.inc.php");
	
    if(isset($_REQUEST["action"])){
        define('ACTION',$_REQUEST["action"]);
        switch(ACTION){
            case "login":
                $login = getPost("login");
                //if(!isset($_SESSION["login"])||$login!="")$_SESSION["login"]=$login;
                //else if(isset($_SESSION["login"])&&$_SESSION["login"]!="")$login = $_SESSION["login"];
                //else error(ACTION);

                $passw = getPost("passw");
                //if(!isset($_SESSION["passw"])||$passw!="")$_SESSION["passw"]=$passw;
                //else if(isset($_SESSION["passw"])&&$_SESSION["passw"]!="")$passw = $_SESSION["passw"];

                $query = "select *, TIMESTAMPDIFF(SECOND,last_update,now()) as last_updatePASSED
                from ".DB_USERS."
                where login='$login' and passw='$passw' limit 1 ";

                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    if($row = mysqli_fetch_assoc($result)) {
                        //print_r($row);
                        $current_time = $row["time_left"];
                        if(!in_array($row["active"],array("0",""))&&$row["last_updatePASSED"]<60)$current_time-=$row["last_updatePASSED"];
                        if($current_time<0)$current_time=0;
                        if($current_time==0)errorArray(array(ACTION,'notimeleft'));
                        //echo in_array($row["active"],array("0",""));
                        if(!in_array($row["active"],array("0","",getPost("mac")))&&$row["last_updatePASSED"]<20)errorArray(array(ACTION,'logged'));

                        printPropertyArray(ACTION,array($row["login"],$current_time,$row["coins"]));
                        mysqli_query($conn,"update ".DB_USERS." set active='".getPost("mac")."', 
                        last_update=now() where id= {$row["id"]}");
                        return;
                    }
                }
                else error(ACTION);
                break;
            case "start":
            case "logout":
                //refresh();
                //$_SESSION=null;
                mysqli_query($conn,"update ".DB_USERS." set active='' where active='".getPost("mac")."'");
                printProperty("logout");
                apps();
                break;
        }
        return;
    }else refresh();
    function refresh(){
        global $conn;
        $query = "select *, TIMESTAMPDIFF(SECOND,last_update,now()) as last_updatePASSED
                        from ".DB_USERS."
                        where active='".getPost("mac")."' ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0 ) {
            if($row = mysqli_fetch_assoc($result)) {

                if($row["last_updatePASSED"]>60||getPost("current_user")==""){
                        mysqli_query($conn,"update ".DB_USERS." set active ='', last_update=now()
                                where active='".getPost("mac")."' and id={$row["id"]}");
                        error('refresh','toolong');
                        return;
                }

                $current_time = $row["time_left"]-$row["last_updatePASSED"];
                if($current_time<0)$current_time=0;
                if($current_time==0){
                        printProperty('logout','time_is_up');
                        mysqli_query($conn,"update ".DB_USERS." set time_left=$current_time, last_update=now(), active=''
                        where active='".getPost("mac")."' and id={$row["id"]}");
                }else{
                        printPropertyArray('login',array($row["login"],$current_time,$row["coins"]));
                        mysqli_query($conn,"update ".DB_USERS." set time_left=$current_time, coins='".($row["coins"]+($row["last_updatePASSED"]*0.01))."' ,last_update=now()
                                where active='".getPost("mac")."' and id={$row["id"]}");
                }

            }
        }
    }
    function apps(){
        global $conn;
        printPropertyDictionary("apps", array(
array("0","Calc","calc")
,array("1","Bethesda","C:\Program Files (x86)\Bethesda.net Launcher\BethesdaNetLauncher.exe")
,array("0","Notepad","notepad")
,array("0","Command Prompt","cmd")
,array("0","Explorer","explorer")
,array("0","Paint","mspaint")
,array("0","Registry Editor","regedit")
,array("0","Display Switch","DisplaySwitch.exe")
));
        
    }
?>