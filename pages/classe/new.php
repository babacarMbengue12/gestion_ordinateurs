<?php

if(!empty($_POST)){
	$d = insert($_POST,'classe');
	global $session;
    if($d === true){
        (new FlashService($session))->success('Classe Ajouter Avec success');
    }
    else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
        (new FlashService($session))->error('Impossible d\'ajouter cette Classe');
    }
    else{
        (new FlashService($session))->error('errure serveur');
    }
	header('location:index.php?p=classe');
    exit(1);
}


?>

<h1 class="text-center">Ajouter une Nouvelle classe</h1>


<form method="post" action="?p=add_classe">
	<div class="form-group">
		<label for="nom">Nom</label>
	     <input type="text" id="nom" class="form-control" name="nom">
	</div>
	<button type="submit" class="btn btn-primary">Ajouter</button>
</form>