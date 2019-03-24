<!DOCTYPE html>
<html>
<head>
	<title>Gestion des ordinateurs</title>
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/app.css">
	<link rel="stylesheet" type="text/css" href="public/css/font-awesome/css/font-awesome.min.css">
</head>
<style type="text/css">
    #rec{
        transition: width 2s;
        width: 150px;
        border-color: #000;
    }
    #rec:hover,#rec:focus{

        width: 500px;
    }

</style>
<body>

  <nav class="navbar bg-primary fixed-top navbar-dark navbar-expand-sm" id="nav">

  	<div class="container">

  	   <a href="index.php" class="navbar-brand">
           <span class="fa fa-home fa-2x"></span>
       </a>
        <ul class="nav navbar-nav ml-auto">
        <?php global $session; $user = $session->get('user');if($user):?>

           <li class="nav-item pl-3 <?=$active == "emprunt" ? "active" : "";?>" title="emprunt">
               <a  href="?p=emprunt" class="nav-link">Emprunts</a>
           </li>
            <li class="nav-item dropdown pl-3 <?=$active == "classe" ? "active" : "";?>" title="Classes">
                <a  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="-caret-down"></span>
                    <span>Classe</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?p=classe" title="Classe">
                        <span class="">Voire les Classes</span>
                    </a>
                    <a class="dropdown-item" href="index.php?p=add_classe" title="classe">
                        <span class="">Nouvelle Classe</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown pl-3 <?=$active == "marque" ? "active" : "";?>" title="Marque">
                <a  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="-caret-down"></span>
                    <span>Marque</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?p=marque" title="marque">
                        <span class="">Voire les Marques</span>
                    </a>
                    <a class="dropdown-item" href="index.php?p=add_marque" title="marque">
                        <span class="">Nouvelle Marque</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown pl-3 <?=$active == "os" ? "active" : "";?>" title="SE">
                <a  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="-caret-down"></span>
                    <span>Systeme d'exploitation</span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?p=os" title="os">
                        <span class="">Systems D'exploitations</span>
                    </a>
                    <a class="dropdown-item" href="index.php?p=add_os" title="os">
                        <span class="">Nouveau SE</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown pl-5 <?=$active == "ordinateur" ? "active" : "";?>" title="Ordinateur">
                <a  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="-caret-down"></span>
                    <span class=" fa fa-2x fa-laptop"></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?p=ordinateur" title="Ordinateur">
                        <span class="">Voire Les Ordinateurs</span>
                    </a>
                    <a class="dropdown-item" href="index.php?p=add_ordinateur" title="Ordinateurs">
                        <span class="">Nouveau Ordinateur</span>
                    </a>
                </div>
            </li>

           <li class="nav-item dropdown pl-5 <?=$active == "etudiant" ? "active" : "";?>" title="Etudiants">
               <a  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                   <span class="-caret-down"></span>
                   <span class=" fa fa-2x fa-group"></span>
               </a>
               <div class="dropdown-menu">
                   <a class="dropdown-item" href="index.php?p=etudiant" title="etudiant">
                       <span class="">Voire les Etudiants</span>
                   </a>
                   <a class="dropdown-item" href="index.php?p=add_etudiant" title="etudiant">
                       <span class="">Nouveau Etudiant</span>
                   </a>
               </div>
           </li>
           <?php endif;?>
               <li class="nav-item dropdown pl-5 <?=$active == "login" ? "active" : "";?>">
                   <a  href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                       <span class="-caret-down"></span>
                       <span class=" fa fa-2x fa-user"></span>
                   </a>
                   <div class="dropdown-menu">
                       <?php if($user !== null):?>
                       <div class="dropdown-item text-muted">connecter en tant que</div>
                       <div class="dropdown-item"><?=$user['nom']?></div>
                       <a href="?p=logout" class="dropdown-item">
                           <span class="fa fa-sign-out"></span> Se Deconnecter
                       </a>
                       <?php else:?>
                           <a href="?p=login" class="dropdown-item">
                               <span class="fa fa-sign-in"></span> Se Connecter
                           </a>
                       <?php endif;?>
                   </div>
               </li>

	  </ul>
  	</div>
</nav>
  
   
   <div class="container<?=$active == 'emprunt' ? "-fluid" : ""?>" style="padding-top: 5rem;padding-bottom: 5rem">

       <?php if ($flash->get('success')): ?>
          <div class="alert alert-success text-center"><?=$flash->get('success')?></div>
       <?php endif;?>
       <?php if ($flash->get('error')): ?>
           <div class="alert alert-danger text-center"><?=$flash->get('error')?></div>
       <?php endif;?>
   	<?php echo $contenue  ?>
   </div>

  <div class="bg-primary footer">
      <div class="container">
          <div class="col-md-12 text-center"><h4>copy right &reg; Ucab 2019 tous droits reserves</h4></div>
      </div>
  </div>

  <script type="text/javascript" src="public/js/jquery.js"></script>
  <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="public/js/app.js"></script>
  <script type="text/javascript">
    
  $("#rec").on('keyup',function(){
    val = $("#rec").val().toLowerCase();
    $('.table tr:not(:first)').filter(function(){
      return $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1)
    })
  })
  $("#showForm").click(function () {
      var that = $(this);
      $(this).next('form').slideDown(function () {
          that.slideUp();
      });
  })
</script>
</body>
</html>
