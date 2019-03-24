<?php

function deleteImage($id){
    $c = getDb();
    $req = "UPDATE ordinateur SET image = NULL WHERE id = $id";
    return mysqli_query($c,$req) or die(mysqli_error($c));
}

function getOrdinateur($id){
     $c = getDb();    
     $req = "SELECT o.*,m.nom as nom_marque,os.nom as nom_os,os.version as version 
             FROM ordinateur o  LEFT JOIN marque m on m.id = o.marque_id LEFT JOIN os on os.id = o.os_id WHERE o.id = $id";
     $res = mysqli_query($c,$req) or die(mysqli_error($c));
     return mysqli_fetch_assoc($res);
      
}

function getAllOrdinateur(){
 
 $c = getDb();    
 $req = "SELECT o.*,m.nom as nom_marque,os.nom as nom_os,os.version as version 
        FROM ordinateur o  LEFT JOIN marque m on m.id = o.marque_id LEFT JOIN os on os.id = o.os_id";
     $res = mysqli_query($c,$req) or die(mysqli_error($c));

      return _extract($res);

}
function getAllOrdinateurNoPreter($prams = []){
 
 $c = getDb();    
 $req = "SELECT o.*,m.nom as nom_marque,os.nom as nom_os,os.version as version 
        FROM ordinateur o  LEFT JOIN marque m on m.id = o.marque_id LEFT JOIN os on os.id = o.os_id
        WHERE NOT exists(SELECT e1.ordinateur_id FROM emprunt e1 WHERE e1.ordinateur_id  = o.id)";

        if(!empty($prams)){
        	foreach ($prams as $key => $value) {
        		$req.= " AND $key = $value";
        	}
        }
     $res = mysqli_query($c,$req) or die(mysqli_error($c));

      return _extract($res);

}