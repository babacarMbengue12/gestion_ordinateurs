<?php
 require 'fonction.php';

    $emprunts = getAllEmprunt();

?>
<h1 class="text-center">Lsite des emprunts</h1>
<div class="row">
    <div class="col-md-4">
        <div class="col-sm-4 mb-3">
            <input type="text" name="rec" id="rec" class="form-control" placeholder="Rechercher">
        </div>
    </div>
</div>
<table class="table table-striped table-bordered text-center">
    <tr>
        <th colspan="6">Etudiant</th>
        <th colspan="5">Ordinateur</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
	<tr>
		<th>Matricule</th>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Email</th>
		<th>Telephone</th>
		<th>Classe</th>

		<th>Marque</th>
		<th>Serie</th>
		<th>Disque</th>
		<th>Processeur</th>
		<th>Ram</th>
        <td></td>
        <td></td>
    </tr>
	<?php foreach ($emprunts as $emprunt): ?>
		<tr>
			<td><?=$emprunt['matricule']?></td>
			<td><?=$emprunt['nom']?></td>
			<td><?=$emprunt['prenom']?></td>
			<td><?=$emprunt['email']?></td>
			<td><?=$emprunt['telephone']?></td>
			<td><?=$emprunt['nom_classe']?></td>

			<td><?=$emprunt['nom_marque']?></td>
			<td><?=$emprunt['serie']?></td>
			<td><?=$emprunt['disque']?></td>
			<td><?=$emprunt['processeur']?></td>
			<td><?=$emprunt['ram']?></td>
			<td><?=$emprunt['date_emprunt']?></td>
			<td>
                <a href="?p=delete_emprunt&id=<?=$emprunt['id_emprunt']?>" class="btn btn-danger">
                    <span class="fa fa-trash-o"></span>
                </a>
			</td>
		</tr>
	<?php endforeach ?>

</table>