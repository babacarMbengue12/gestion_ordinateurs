<?php
global $session;
if($session->get('user')){
    header('location:index.php');
    exit();
}
if(!empty($_POST))
{

    extract($_POST);
    $user = getBy('username',$username,'users');
    if($user && $user['password'] === sha1($password)){
        $session->set('user',$user);
        (new FlashService($session))->success('Vous etes maintenant connecter');
        header('location:index.php');
        exit(1);
    }
    else{
        (new FlashService($session))->error('Identifiant ou Mot de pass incorrect');
    }
}

?>

<div class="row" style="padding-top: 8rem">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form method="post">
            <div class="card">
               <div class="card-header text-center">
                   <span class="fa fa-user fa-5x card-img-top"></span>
               </div>
            </div>
            <div class="card-body">
                <div class="card-title text-center mb-2">Connexion</div>
                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <input class="form-control" type="text" id="username" name="username" placeholder="Username">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary btn-block" type="submit">Se Connecter</button>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>

</div>
