<?php

     $d = delete($_GET['id'],'classe');
    global $session;
	if($d === true){
        (new FlashService($session))->success('Classe Supprimer Avec success');
    }
    else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
        (new FlashService($session))->error('Impossible de supprimer cette classe Veillez D\'abord Supprimer Les Etudiants Associees');
    }
    else{
        (new FlashService($session))->error('errure serveur');
    }

	header('location:index.php?p=classe');
	exit(1);

?>
