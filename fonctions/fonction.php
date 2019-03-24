<?php
define("ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW",5);

function getDb(){
	$c = mysqli_connect('localhost','root','babacar','gestion_ordinateur') or die(mysqli_error($c));
	return $c;
}

function getAll($table){
 
 $c = getDb();    $req = "SELECT * FROM $table";
     $res = mysqli_query($c,$req) or die(mysqli_error($c));

      return _extract($res);

}
function getBy($field,$value,$table){
 
 $c = getDb();    $req = "SELECT * FROM $table WHERE $field = '$value'";
     $res = mysqli_query($c,$req) or die(mysqli_error($c));

      return mysqli_fetch_assoc($res);

}
function getMaxId($table){
 
 $c = getDb();    
 $req = "SELECT MAX(id) as id FROM $table LIMIT 1";
     $res = mysqli_query($c,$req) or die(mysqli_error($c));
     
      $res = mysqli_fetch_assoc($res);
      if(is_null($res) || empty($res)){
        return 0;
      }
     
      return  (int)$res['id'];
     
}
function get($id,$table){
 
 $c = getDb();    $req = "SELECT * FROM $table WHERE id= $id";
     $res = mysqli_query($c,$req) or die(mysqli_error($c));
     return mysqli_fetch_assoc($res);
      

}
function update($id,$prams,$table){
     $field = join(", ",array_map(function($key)use($prams){
           return "$key = '$prams[$key]'";
     },array_keys($prams)));
     $c = getDb();
	$req = "UPDATE $table SET $field WHERE id=$id";
	return mysqli_query($c,$req) or die(mysqli_error($c));
}
function delete($id,$table){
    
	
	$c = getDb();$req = "DELETE FROM $table WHERE id=$id";

        $res = mysqli_query($c,$req) ;
        if($res === true)
        {
            return $res;
        }
        else {
            if(strlen($c->error) > 0 && strpos($c->error,"foreign key constraint fails") !== false){
               return ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW;
            }
            else{
                die($c->error);
            }

        }


}
function insert($prams,$table){
     $field = join(", ",array_map(function($key)use($prams){
           return "$key = '$prams[$key]'";
     },array_keys($prams)));
     $c = getDb();
	$req = "INSERT  INTO $table SET $field";
	return mysqli_query($c,$req) or die(mysqli_error($c));
}
function _extract($res){
	$t = [];
	while ($c = mysqli_fetch_assoc($res)){
		$t[]=$c;
	}

	return $t;
}