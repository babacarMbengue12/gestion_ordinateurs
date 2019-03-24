<?php

	$d = delete($_GET['id'],'ordinateur');
	global $session;
	if($d === true){
		(new FlashService($session))->success('Ordinateur Supprimer Avec success');
	}
	else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
		(new FlashService($session))->error('Impossible de supprimer cette ordinateurs car il est prete');
	}
	else{
		(new FlashService($session))->error('errure serveur');
	}

	header('location:index.php?p=ordinateur');
exit(1);

?>
