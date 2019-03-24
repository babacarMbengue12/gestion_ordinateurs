<?php
$id =$_GET['id'];

require 'fonction.php';
if(!empty($_POST)){
	
	$d = update($id,$_POST,'etudiant');
    global $session;
    if($d === true){
        (new FlashService($session))->success('Etudiant Modifier Avec success');
    }
    else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
        (new FlashService($session))->error('Impossible de Modifier cette Etudiant');
    }
    else{
        (new FlashService($session))->error('errure serveur');
    }
	header('location:index.php?p=etudiant');
    exit(1);
}

$etudiant = getEtudiant($id);

$classes = getAll('classe');


?>

<h1 class="text-center">Editer l'etudiant <?=$etudiant['nom'] .' - '.$etudiant['prenom']?></h1>
<form method="post" action="?p=edit_etudiant&id=<?=$etudiant['id']?>">
	<div class="form-group">
		<label for="nom">Nom</label>
	     <input type="text" id="nom" class="form-control" name="nom"  value="<?=$etudiant['nom']?>">
	</div>
	<div class="form-group">
		<label for="prenom">Preom</label>
	     <input type="text" id="prenom" class="form-control" name="prenom" value="<?=$etudiant['prenom']?>">
	</div>
	<div class="form-group">
		<label for="telephone">Telephone</label>
	     <input type="text" id="telephone" class="form-control" name="telephone" value="<?=$etudiant['telephone']?>">
	</div>
	<div class="form-group">
		<label for="adresse">adresse</label>
	     <input type="text" id="adresse" class="form-control" name="adresse" value="<?=$etudiant['adresse']?>">
	</div>
	<div class="form-group">
		<label for="email">email</label>
	     <input type="email" id="email" class="form-control" name="email" value="<?=$etudiant['email']?>">
	</div>
	<div class="form-group">
		<label for="classe_id">Classe</label>
		<select name="classe_id" id="classe_id" class="form-control">
		   <?php foreach ($classes as $classe) :?>
		   	<option value="<?=$classe['id']?>"<?= $classe['id'] === $etudiant['classe_id'] ? " selected='true'" : ""?>><?=$classe['nom']?></option>
           <?php endforeach;?>
	    </select>
	</div>
	<div class="form-group">
		<label for="matricule">Matricule</label>
	     <input type="text" id="matricule" class="form-control" name="matricule" value="<?=$etudiant['matricule']?>" disabled="desabled">
	</div>
	<button type="submit" class="btn btn-primary">Ajouter</button>
</form>