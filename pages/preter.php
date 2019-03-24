<?php
require_once 'ordinateur/fonction.php';
require_once 'emprunt/fonction.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$message = "";

if(!empty($_POST)){
    $id = $_POST['ordinateur_id'];

    $ordinateur = getOrdinateur($id);

    $etudiant = getBy('matricule',$_POST['matricule'],'etudiant');


    if(empty($etudiant)){
        $message = "Cet matricule n'est pas valide";
    }
    else{
        $exist = empruntExist($etudiant["id"],$id);
        $existE  = existForEtudiant($etudiant['id']);
        $existO = existForOrdinateur($id);

      if($existE){
          $message = "Cet Etudiant A Deja emprunte un ordinateur";
      }
      else{
          if($existO || $exist){
              $message = "Cet Ordinateur a ete Deja emprunte";
          }
          else{
             $d = insert([
                  'ordinateur_id'=> $id,
                  'etudiant_id'=>$etudiant['id'],
              ],"emprunt");
             global $session;
             if($d === true){
                 (new FlashService($session))->success('Pret enregistrer Avec success');
             }
             else{
                 (new FlashService($session))->error('Pret Non enregistrer');
             }
              header('location:index.php?p=emprunt');
              exit(1);
          }
      }

    }
}
$ordinateur = getOrdinateur($id);



?>
<h1 class="text-center">Preter l'ordinateur <?=$ordinateur['nom_marque'] .'-'.$ordinateur['serie']?></h1>

<div class="row pt-2">
    <?php if(!empty($message)):?>
      <div class="col-md-12">
          <div class="alert alert-danger text-center">
              <?=$message?>
          </div>
      </div>
    <?php endif;?>
    <div class="col-md-8">
        <?php if(!empty($ordinateur['image'])):?>
                <img src="images/<?=$ordinateur['image']?>" alt="" style="width: 100%" height="auto">
        <?php else:?>
            <img src="images/default.png" alt="">
        <?php endif;?>
    </div>
    <div class="col-md-4">
        <table class="table table-striped">
            <tr>
                <th>Serie</th>
                <td><?=$ordinateur['serie']?></td>
            </tr>
            <tr>
                <th>Marque</th>
                <td><?=$ordinateur['nom_marque']?></td>
            </tr>
            <tr>
                <th>System d'exploitation</th>
                <td><?=$ordinateur['nom_os']?></td>
            </tr>
            <tr>
                <th>Version</th>
                <td><?=$ordinateur['version']?></td>
            </tr>
            <tr>
                <th>Disque</th>
                <td><?=$ordinateur['disque']?></td>
            </tr>
            <tr>
                <th>Processeur</th>
                <td><?=$ordinateur['processeur']?></td>
            </tr>

        </table>
        <button id="showForm" class="btn btn-primary">Preter</button>
        <form method="post" style="display: none">
            <div class="form-group">
                <label for="matricule">Donner le matricule De l'etudiant</label>
                <input type="text" name="matricule" class="form-control" id="matricule">
                <input type="hidden" name="ordinateur_id" value="<?=$ordinateur['id']?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="preter">Valider</button>
            </div>
        </form>
    </div>
</div>
