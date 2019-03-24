<?php

	$d =delete($_GET['id'],'etudiant');
	global $session;
	if($d === true){
		(new FlashService($session))->success('Etudiant Supprimer Avec success');
	}
	else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
		(new FlashService($session))->error('Impossible de supprimer cette Etudiant Veillez Supprimer ces emprunts');
	}
	else{
		(new FlashService($session))->error('errure serveur');
	}

	header('location:index.php?p=etudiant');
    exit(1);

?>
