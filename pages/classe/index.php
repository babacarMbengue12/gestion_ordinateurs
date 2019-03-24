<?php

$classes = getAll('classe');

?>
<h1 class="text-center">Gerer les Classe</h1>
<div class="text-right">
	<a href="index.php?p=add_classe" class="btn btn-success mb-2" title="Nouvelle Classe">
        <span class="fa fa-2x fa-plus"></span>
    </a>
</div>
<table class="table table-striped table-bordered text-center">
	<tr>
		<th>Code</th>
		<th>nom</th>
		<th>Action</th>
	</tr>
	<?php foreach ($classes as $classe):?>

     <tr>
     	<td><?=$classe['id']?></td>
     	<td><?=$classe['nom']?></td>
     	<td>
     		<a class="btn btn-primary" href="index.php?p=edit_classe&id=<?=$classe['id']?>" title="Editer">
                <span class="fa fa-edit"></span>
            </a>
     		<a class="btn btn-danger" href="index.php?p=delete_classe&id=<?=$classe['id']?>" title="Supprimer">
                <span class="fa fa-trash-o"></span>
            </a>
     	</td>
     </tr>

	<?php endforeach;?>

</table>