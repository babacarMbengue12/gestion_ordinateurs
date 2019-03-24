<?php

global $session;
$session->delete('user');
(new FlashService($session))->success('Vous etes Maintenant Deconnecte');
header('location:index.php');
exit(1);
