<?php
session_start();
$page = isset($_GET['p']) ? $_GET['p'] : "index";
require_once 'helpers/init.php';
$flash = new FlashService($session);

ob_start();

if($page === 'login'){
    require_once 'pages/login/login.php';
}
else if($page === 'logout'){
    require_once 'pages/login/logout.php';
}
else if($page == "index"){
	require 'pages/index.php';
}
elseif($page == "preter"){
    require 'pages/preter.php';
}
genererUrl($page,'classe');

genererUrl($page,'etudiant');

genererUrl($page,'marque');

genererUrl($page,'os');

genererUrl($page,'ordinateur');

genererUrl($page,'emprunt');


$active = explode('/',$page)[0];
if(strpos($active,"_") !== false){
	$active = explode('_', $active)[1];
}
$active = strtolower($active);

$contenue = ob_get_clean();


require 'pages/template.php';


function genererUrl($page,$table){
	if($page === $table){
	  require "pages/$table/index.php";
	}
	elseif($page === "edit_$table"){
		require "pages/$table/edit.php";
	}
	elseif($page === "add_$table"){
		require "pages/$table/new.php";
	}
	elseif($page === "delete_$table"){
		require "pages/$table/delete.php";
   }
}