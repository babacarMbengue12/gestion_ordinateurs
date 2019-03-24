<?php

global $session;

$id = $_GET['id'];

if(!empty($_POST)){
	if(update($id,$_POST,'classe')){
        (new FlashService($session))->success('Classe Modifier Avec success');
    }
    else{
        (new FlashService($session))->error('echec de la modifcation');
    }
    header('location:index.php?p=classe');
    exit(1);
}

$classe = get($id,'classe');



?>

<h1 class="text-center">Editer la classe <?=$classe['nom']?></h1>

<form method="post" action="?p=edit_classe&id=<?=$classe['id']?>">
	<div class="form-group">
		<label for="nom">Nom</label>
	     <input type="text" id="nom" class="form-control" name="nom" value="<?=$classe['nom']?>">
	</div>
	<button type="submit" class="btn btn-primary">Editer</button>
</form>