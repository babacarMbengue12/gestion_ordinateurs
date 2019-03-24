<?php
require 'fonction.php';

$ordinateurs = getAllOrdinateurNoPreter();

?>
<h1 class="text-center">Gerer les ordinateurs</h1>
<div class="row">
	<div class="col-sm-4">
		<input type="text" name="rec" id="rec" class="form-control" placeholder="Rechercher">
	</div>
	<div class="col-sm-4"></div>
	<div class="col-sm-4 text-right">
	<a href="index.php?p=add_ordinateur" class="btn btn-success mb-2" title="Nouveau Ordinateur">
        <span class="fa fa-3x fa-plus"></span>
    </a>
		
	</div>
</div>
<table class="table table-bordered table-striped text-center">
	<tr>
		<th>Serie</th>
		<th>Disque</th>
		<th>Ram</th>
		<th>Processeur</th>
		<th>Marque</th>
		<th>SE</th>
		<th>Action</th>
	</tr>
	<?php foreach ($ordinateurs as $ordinateur):?>

     <tr>
     	<td><?=$ordinateur['serie']?></td>
     	<td><?=$ordinateur['disque']?></td>
     	<td><?=$ordinateur['ram']?></td>
     	<td><?=$ordinateur['processeur']?></td>
     	<td><?=$ordinateur['nom_marque']?></td>
     	<td><?=$ordinateur['nom_os']?>-<?=$ordinateur['version']?></td>
     	<td>
     		<a class="btn btn-primary" href="index.php?p=edit_ordinateur&id=<?=$ordinateur['id']?>" title="Modifier">
                <span class="fa fa-edit"></span>
            </a>
     		<a class="btn btn-danger" href="index.php?p=delete_ordinateur&id=<?=$ordinateur['id']?>" title="Supprimer">
                <span class="fa fa-trash-o"></span>
            </a>
     	</td>
     </tr>

	<?php endforeach;?>

</table>


