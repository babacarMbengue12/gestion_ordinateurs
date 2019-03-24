<?php

if(!empty($_POST)){
	$d = insert($_POST,'os');
    global $session;
    if($d === true){
        (new FlashService($session))->success('Systeme d\'exploitation Ajouter Avec success');
    }
    else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
        (new FlashService($session))->error('Impossible d\'ajouter cette SE');
    }
    else{
        (new FlashService($session))->error('errure serveur');
    }
	header('location:index.php?p=os');
    exit(1);
}


?>

<h1 class="text-center">Ajouter une nouveau systeme d'exploitation</h1>
<form method="post" action="?p=add_os">
	<div class="form-group">
		<label for="nom">Nom</label>
	     <input type="text" id="nom" class="form-control" name="nom">
	</div>
	<div class="form-group">
		<label for="version">Version</label>
	     <input type="text" id="version" class="form-control" name="version">
	</div>
	<button type="submit" class="btn btn-primary">Ajouter</button>
</form>