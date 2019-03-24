<?php


function getEtudiant($id){
     $c = getDb();    
     $req = "SELECT e.*,c.nom as nom_classe FROM etudiant e  LEFT JOIN classe c on c.id = e.classe_id WHERE e.id= $id";
     $res = mysqli_query($c,$req) or die(mysqli_error($c));
     return mysqli_fetch_assoc($res);
      
}

function getAllEtudiant(){
 
 $c = getDb();    
 $req = "SELECT e.*,c.nom as nom_classe FROM etudiant e  LEFT JOIN classe c on c.id = e.classe_id";
     $res = mysqli_query($c,$req) or die(mysqli_error($c));

      return _extract($res);

}