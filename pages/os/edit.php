<?php


$id = $_GET['id'];

if(!empty($_POST)){
	$d = update($id,$_POST,'os');
    global $session;
    if($d === true){
        (new FlashService($session))->success('Systeme d\'exploitation Modifier Avec success');
    }
    else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
        (new FlashService($session))->error('Impossible de Modifier cette SE');
    }
    else{
        (new FlashService($session))->error('errure serveur');
    }
	header('location:index.php?p=os');
    exit(1);
}

$os = get($id,'os');



?>

<h1 class="text-center">Editer le system d'exploitation <?=$os['nom']?><?=$os['version']?></h1>
<form method="post" action="?p=edit_os&id=<?=$os['id']?>">
	<div class="form-group">
		<label for="nom">Nom</label>
	     <input type="text" id="nom" class="form-control" name="nom" value="<?=$os['nom']?>">
	</div>
	<div class="form-group">
		<label for="version">Version</label>
	     <input type="text" id="version" class="form-control" name="version" value="<?=$os['version']?>">
	</div>
	<button type="submit" class="btn btn-primary">Editer</button>
</form>