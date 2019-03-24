<?php

require_once 'fonctions/fonction.php';
require_once 'ImageUploader.php';
require_once 'Session.php';
require_once 'FlashService.php';
$session = new Session();
$visibles = ['index','login','logout'];
if(!$session->get('user',false) && !in_array($page,$visibles)){
    (new FlashService($session))->error('vous devez Vous Connecter Pour Acceder A cette Page');
    header('location:index.php?p=login');
    exit(1);
}
