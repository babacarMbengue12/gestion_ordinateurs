<?php
$id = $_GET['id'];
$d = delete($id,"emprunt");
global $session;
if($d === true){
    (new FlashService($session))->success('Emprunt Supprimer Avec success');
}
else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
    (new FlashService($session))->error('Impossible de supprimer cette Emprunt');
}
else{
    (new FlashService($session))->error('errure serveur');
}

header('location:index.php?p=emprunt');
exit(1);