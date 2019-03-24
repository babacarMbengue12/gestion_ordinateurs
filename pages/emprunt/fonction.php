
<?php

function getAllEmprunt(){
	$req = "
	SELECT e.date_emprunt,e.id id_emprunt,o.serie,o.disque,o.processeur,o.ram,et.*,m.nom nom_marque,os.nom nom_os ,os.version,c.nom nom_classe
	FROM 
	emprunt as e 
	LEFT JOIN ordinateur as o on  o.id = e.ordinateur_id
	LEFT JOIN marque m on m.id = o.marque_id
	LEFT JOIN os on os.id = o.os_id
	
	LEFT JOIN etudiant as et on et.id = e.etudiant_id
	LEFT JOIN classe c on c.id = et.classe_id";

	$con = getDb();
	$res = mysqli_query($con,$req) or die(mysqli_error($con));

	return _extract($res);
}
function getEmprunt($e,$o){
    $req = "
	SELECT e.date_emprunt,o.serie,et.* 
	FROM 
	emprunt as e 
	LEFT JOIN ordinateur as o on  o.id = e.ordinateur_id 
	LEFT JOIN etudiant as et on et.id = e.etudiant_id WHERE e.ordinateur_id = $o AND e.etudiant_id = $e";

    $con = getDb();
    $res = mysqli_query($con,$req) or die(mysqli_error($con));

    return mysqli_fetch_assoc($res);
}
function empruntExist($e,$o){
    $req = "
	SELECT e.date_emprunt,o.serie,et.* 
	FROM emprunt as e 
	LEFT JOIN ordinateur as o on  o.id = e.ordinateur_id 
	LEFT JOIN etudiant as et on et.id = e.etudiant_id WHERE e.ordinateur_id = $o AND e.etudiant_id = $e";

    $con = getDb();
    $res = mysqli_query($con,$req) or die(mysqli_error($con));

    return !empty(mysqli_fetch_assoc($res));
}
function existForEtudiant($e){
    $req = "
	SELECT e.date_emprunt,o.serie,et.* 
	FROM 
	emprunt as e 
	LEFT JOIN ordinateur as o on  o.id = e.ordinateur_id 
	LEFT JOIN etudiant as et on et.id = e.etudiant_id WHERE e.etudiant_id = $e";

    $con = getDb();
    $res = mysqli_query($con,$req) or die(mysqli_error($con));

    return !empty(mysqli_fetch_assoc($res));
}
function existForOrdinateur($o){
    $req = "
	SELECT e.date_emprunt,o.serie,et.* 
	FROM 
	emprunt as e 
	LEFT JOIN ordinateur as o on  o.id = e.ordinateur_id 
	LEFT JOIN etudiant as et on et.id = e.etudiant_id WHERE e.ordinateur_id = $o";

    $con = getDb();
    $res = mysqli_query($con,$req) or die(mysqli_error($con));

    return !empty(mysqli_fetch_assoc($res));
}