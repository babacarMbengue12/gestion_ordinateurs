<?php
require 'fonction.php';

$etudiants = getAllEtudiant();

?>
<h1 class="text-center head">Gerer Les etudiants</h1>
<div class="row">
    <div class="col-md-4">
        <div class="col-sm-4 mb-3">
            <input type="text" name="rec" id="rec" class="form-control" placeholder="Rechercher">
        </div>
    </div>
    <div class=" col-md-8 text-right">
        <a href="index.php?p=add_etudiant" class="btn btn-success mb-2" title="Nouveau Etudiant">
            <span class="fa fa-2x fa-plus"></span>
        </a>
    </div>
</div>
<table class="table table-striped table-bordered text-center">
	<tr>
		<th>Matricule</th>
		<th>nom</th>
		<th>Prenom</th>
		<th>telephone</th>
		<th>Adresse</th>
		<th>Email</th>
		<th>Classe</th>
		<th>Action</th>
	</tr>
	<?php foreach ($etudiants as $etudiant):?>

     <tr>
     	<td><?=$etudiant['matricule']?></td>
     	<td><?=$etudiant['nom']?></td>
     	<td><?=$etudiant['prenom']?></td>
     	<td><?=$etudiant['telephone']?></td>
     	<td><?=$etudiant['adresse']?></td>
     	<td><?=$etudiant['email']?></td>
     	<td><?=$etudiant['nom_classe']?></td>
     	<td>
     		<a class="btn btn-primary" href="index.php?p=edit_etudiant&id=<?=$etudiant['id']?>" title="Editer">
                <span class="fa fa-edit"></span>
            </a>
     		<a class="btn btn-danger" href="index.php?p=delete_etudiant&id=<?=$etudiant['id']?>" title="Supprimer">
                <span class="fa fa-trash-o"></span>
            </a>
     	</td>
     </tr>

	<?php endforeach;?>

</table>