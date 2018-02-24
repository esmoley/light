<?php if($secret!="afuhznkxjcvnkjasdgihgkjrweqqwr")die();
	class Respond{
        public $data = array();
        public function add($key,$value='true'){
            $this->data[$key] = $value;
        }
        public function error($value){
            die(json_encode (array("error"=>$value)));
        }
        public function show(){
            print json_encode ($this->data);
        }
    }
	/*function error($value){
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
    */
?>