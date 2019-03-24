<?php

$oss = getAll('os');

?>
<h1 class="text-center">Gerer les Systemes d'exploitation</h1>
<div class="text-right">
	<a href="index.php?p=add_os" class="btn btn-success mb-2" title="Nouveau SE">
        <span class="fa fa-plus fa-2x"></span>
    </a>
</div>
<table class="table table-bordered table-striped text-center">
	<tr>
		<th>ID</th>
		<th>Nom</th>
		<th>Version</th>
		<th>Action</th>
	</tr>
	<?php foreach ($oss as $os):?>

     <tr>
     	<td><?=$os['id']?></td>
     	<td><?=$os['nom']?></td>
     	<td><?=$os['version']?></td>
     	<td>
     		<a class="btn btn-primary" href="index.php?p=edit_os&id=<?=$os['id']?>" title="Editer">
                <span class="fa fa-edit"></span>
            </a>
     		<a class="btn btn-danger" href="index.php?p=delete_os&id=<?=$os['id']?>" title="Supprimer">
                <span class="fa fa-trash-o"></span>
            </a>
     	</td>
     </tr>

	<?php endforeach;?>

</table>