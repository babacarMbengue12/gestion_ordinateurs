<?php

$marques = getAll('marque');

?>
<h1 class="text-center">Gerer Les Marques</h1>
<div class="text-right">
	<a href="index.php?p=add_marque" class="btn btn-success mb-2" title="Nouvelle marque">
        <span class="fa fa-2x fa-plus"></span>
    </a>
</div>
<table class="table table-striped table-bordered text-center">
	<tr>
		<th>Code</th>
		<th>nom</th>
		<th>Action</th>
	</tr>
	<?php foreach ($marques as $marque):?>

     <tr>
     	<td><?=$marque['id']?></td>
     	<td><?=$marque['nom']?></td>
     	<td>
     		<a class="btn btn-primary" href="index.php?p=edit_marque&id=<?=$marque['id']?>" title="Editer">
                <span class="fa fa-edit"></span>
            </a>
     		<a class="btn btn-danger" href="index.php?p=delete_marque&id=<?=$marque['id']?>" title="Supprimer">
                <span class="fa fa-trash-o"></span>
            </a>
     	</td>
     </tr>

	<?php endforeach;?>

</table>