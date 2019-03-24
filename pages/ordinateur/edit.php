<?php

$id = $_GET['id'];
$ordinateur = get($id,"ordinateur");
global $session;
$helper = new ImageUploader();
if(!empty($_POST)){
    if(isset($_FILES['image']))
    {
        $_POST['image'] = $helper->useImage($_FILES['image'])
            ->deleteOldFile($ordinateur['image'])
            ->extensions(['png','jpg','jpeg'])
            ->saveInto('images')
            ->save();
        $_FILES = array_filter($_FILES['image']);
        if(empty($_POST['image']) && !empty($_FILES['image'])){
            (new FlashService($session))->error("Fichier non uploader");
            unset($_POST['image']);
        }
    }



	$d = update($id,$_POST,'ordinateur');

    if($d === true){
        (new FlashService($session))->success('ordinateur modifier Avec success');
    }
    else if($d === ERROR_CAN_NOT_UPDATE_OR_DELETE_PARENT_ROW){
        (new FlashService($session))->error('Impossible de modifier cette Ordinateur');
    }
    else{
        (new FlashService($session))->error('errure serveur');
    }
	header('location:index.php?p=ordinateur');
    exit(1);
}
if(isset($_GET['a'])){
    require_once 'fonction.php';
    deleteImage($ordinateur['id']);
    (new FlashService($session))->success('Image Supprimer Avec Success');
  $helper->deleteSingleImage($ordinateur['image'],'images');
  unset($ordinateur['image']);
}

$marques = getAll('marque');
$oss = getAll('os');


?>
<h1 class="text-center">Editer l'ordinateur <?=$ordinateur['serie']?></h1>
<div class="row">
    <div class="col-md-8">

        <form method="post" action="?p=edit_ordinateur&id=<?=$ordinateur['id']?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="serie">serie</label>
                <input type="text" id="serie" class="form-control" name="serie" value="<?=$ordinateur['serie']?>">
            </div>
            <div class="form-group">
                <label for="disque">disque</label>
                <input type="text" id="disque" class="form-control" name="disque" value="<?=$ordinateur['disque']?>">
            </div>
            <div class="form-group">
                <label for="ram">ram</label>
                <input type="text" id="ram" class="form-control" name="ram" value="<?=$ordinateur['ram']?>">
            </div>
            <div class="form-group">
                <label for="processeur">processeur</label>
                <input type="text" id="processeur" class="form-control" name="processeur" value="<?=$ordinateur['processeur']?>">
            </div>
            <div class="form-group">
                <label for="marque_id">marque</label>
                <select name="marque_id" id="marque_id" class="form-control">
                    <?php foreach ($marques as $marque) :?>
                        <option value="<?=$marque['id']?>" <?= $marque['id'] === $ordinateur['marque_id'] ? " selected='true'" : ""?>><?=$marque['nom']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="os_id">Systeme d'exploiatation</label>
                <select name="os_id" id="os_id" class="form-control">
                    <?php foreach ($oss as $os) :?>
                        <option value="<?=$os['id']?>" <?= $os['id'] === $ordinateur['os_id'] ? " selected='true'" : ""?>><?=$os['nom']?> - <?=$os['version']?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" class="form-control-file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    <div class="col-md-4">
        <?php if(!empty($ordinateur['image'])):?>
          <div class="row">
              <div class="col-md-12">
                  <img src="images/<?=$ordinateur['image']?>" width="100%" height="auto">
              </div>
              <div class="col-md-12">
                  <a href="?p=edit_ordinateur&id=<?=$ordinateur['id']?>&a=delete_image"
                     class="btn btn-block btn-danger">Supprimer</a>
              </div>
          </div>
        <?php endif;?>
    </div>
</div>
