<?php
$helper = new ImageUploader();
global $session;
if(!empty($_POST)){
    if(isset($_FILES['image']))
    {
        $_POST['image'] = $helper->useImage($_FILES['image'])
            ->extensions(['png','jpg','jpeg'])
            ->saveInto('images')
            ->save();
        $_FILES = array_filter($_FILES['image']);
        if(empty($_POST['image']) && !empty($_FILES['image'])){
            (new FlashService($session))->error("Fichier non uploader");
            unset($_POST['image']);
        }
    }
	$d = insert($_POST,'ordinateur');

    if($d === true){
        (new FlashService($session))->success('ordinateur Ajouter Avec success');
    }
    else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
        (new FlashService($session))->error('Impossible d\'ajouter cette Ordinateur');
    }
    else{
        (new FlashService($session))->error('errure serveur');
    }
	header('location:index.php?p=ordinateur');
    exit(1);
}


$marques = getAll('marque');
$oss = getAll('os');

?>

<h1 class="text-center">Ajouter une Nouvelle ordinateur</h1>
<form method="post" action="?p=add_ordinateur" enctype="multipart/form-data">
	<div class="form-group">
		<label for="serie">serie</label>
	     <input type="text" id="serie" class="form-control" name="serie">
	</div>
	<div class="form-group">
		<label for="disque">disque</label>
	     <input type="text" id="disque" class="form-control" name="disque">
	</div>
	<div class="form-group">
		<label for="ram">ram</label>
	     <input type="text" id="ram" class="form-control" name="ram">
	</div>
	<div class="form-group">
		<label for="processeur">processeur</label>
	     <input type="text" id="processeur" class="form-control" name="processeur">
	</div>
	<div class="form-group">
		<label for="marque_id">marque</label>
		<select name="marque_id" id="marque_id" class="form-control">
		   <?php foreach ($marques as $marque) :?>
		   	<option value="<?=$marque['id']?>"><?=$marque['nom']?></option>
           <?php endforeach;?>
	    </select>
	</div>
	<div class="form-group">
		<label for="os_id">Systeme d'exploiatation</label>
		<select name="os_id" id="os_id" class="form-control">
		   <?php foreach ($oss as $os) :?>
		   	<option value="<?=$os['id']?>"><?=$os['nom']?> - <?=$os['version']?></option>
           <?php endforeach;?>
	    </select>
	</div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" class="form-control-file" name="image">
    </div>

	<button type="submit" class="btn btn-primary">Ajouter</button>
</form>