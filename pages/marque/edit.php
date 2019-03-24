<?php


$id = $_GET['id'];

if(!empty($_POST)){
	$d = update($id,$_POST,'marque');
    global $session;
    if($d === true){
        (new FlashService($session))->success('Marque Modifier Avec success');
    }
    else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
        (new FlashService($session))->error('Impossible de Modifier cette marque');
    }
    else{
        (new FlashService($session))->error('errure serveur');
    }
	header('location:index.php?p=marque');
    exit(1);
}

$marque = get($id,'marque');



?>

<h1 class="text-center">Editer la marque <?=$marque['nom']?></h1>

<form method="post" action="?p=edit_marque&id=<?=$marque['id']?>">
	<div class="form-group">
		<label for="nom">Nom</label>
	     <input type="text" id="nom" class="form-control" name="nom" value="<?=$marque['nom']?>">
	</div>
	<button type="submit" class="btn btn-primary">Editer</button>
</form>