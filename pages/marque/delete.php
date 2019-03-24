<?php

	$d = delete($_GET['id'],'marque');
	global $session;
	if($d === true){
		(new FlashService($session))->success('Marque Supprimer Avec success');
	}
	else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
		(new FlashService($session))->error('Impossible de supprimer cette marque Veillez D\'abord Supprimer Les Ordinateurs Associees');
	}
	else{
		(new FlashService($session))->error('errure serveur');
	}

	header('location:index.php?p=marque');
exit(1);

?>
