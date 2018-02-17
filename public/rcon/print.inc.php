<?php
	
	function error($value){
            printProperty("error",$value);
            die();
	}
        function errorArray($value){
            printPropertyArray("error",$value);
            die();
	}
	function printProperty($property,$value=null){
            printf ("?".$property);
            if($value!=null){
                printf("`".$value);
            }
	}
        function printPropertyArray($property,$value= array()){
            printProperty($property,implode("~",$value));
	}
        function printPropertyDictionary($property,$value=array(array())){
            $data = array();
            foreach ($value as $key=>$val){
                $data[$key] = implode("^",$val);
            }
            printPropertyArray($property,$data);
        }
	function getPost($s) {
        if (array_key_exists($s, $_REQUEST))
            return mysql_real_escape_string($_REQUEST[$s]);
        return "";
    }
?>