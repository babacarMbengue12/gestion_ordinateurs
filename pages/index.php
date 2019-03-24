<?php

require 'ordinateur/fonction.php';

$marques = getAll("marque");

$oss = getAll("os");

$ordinateurs = getAllOrdinateurNoPreter(array_filter($_GET));
?>
<h1 class="text-center mb-2 mt-2">Bienvenue dans L'application Gestion des ordinateurs</h1>
<div class="jumbotron">
	<form method="get" class="form-inline">
		<div class="row">
            <div class="input-group">
                <div class="form-group pr-4">
                    <select name="marque_id" id="marque_id" class="form-control">
                        <option value="" selected>Marque</option>
                        <?php foreach ($marques as $marque) :?>
                            <option value="<?=$marque['id']?>"><?=$marque['nom']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group pr-4">
                    <select name="os_id" id="os_id" class="form-control">
                        <option selected value="">Systeme d'exploiatation</option>
                        <?php foreach ($oss as $os) :?>
                            <option value="<?=$os['id']?>"><?=$os['nom']?> - <?=$os['version']?></option>
                        <?php endforeach;?>
                    </select>
                </div>

                <button class="btn btn-primary">Rechercher</button>
            </div>
        </div>
	</form>
</div>
<div class="row">
	<?php foreach ($ordinateurs as $ordinateur):?>

     <div class="col-md-4">
     	<div class="card order mb-4" style="width: 18rem">
                <div class="card-header text-center">
                    <a href="?p=preter&id=<?=$ordinateur['id']?>">
                        <?php if (!empty($ordinateur['image'])):?>
                            <img src="images/<?=$ordinateur['image']?>"  class="card-img-top img-thumbnail"
                                 style="auto;height: 170px;">
                        <?php else:?>
                            <img src="images/default.png"  class="card-img-top img-thumbnail"
                                 style="auto;height: 170px;">
                        <?php endif;?>
                    </a>
                </div>

     	<div class="card-body">
            <p>Marque : <?=$ordinateur['nom_marque'] ?></p>
     		<p class="card-text">SE : <?=$ordinateur['nom_os'].'-'.$ordinateur['version']?></p>
     		<p class="card-text">Disque : <?=$ordinateur['disque']?></p>
     		<p class="card-text">CPU : <?=$ordinateur['processeur']?></p>
     		<p class="card-text">RAM : <?=$ordinateur['ram']?></p>
     		<p class="card-text">Serie : <?=$ordinateur['serie']?></p>
     	</div>
     	<div class="card-header">
     		<a href="?p=preter&id=<?=$ordinateur['id']?>" class="btn btn-primary">Voire</a>
     	</div>
     </div>

     </div>

	<?php endforeach;?>
</div>