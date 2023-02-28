<?php
session_start();


// Récupération des informations de cookie actuelles
$params = session_get_cookie_params();

// Expire le cookie en le réglant sur hier
setcookie(session_name(), '', strtotime('-1 day'), $params['path'], $params['domain'], $params['secure'], $params['httponly']);

// Détruit toutes les variables d'une session
session_unset();

// Destruction de la session
session_destroy();

// Redirection vers la page d'authentification
header("Location: ../index.php");
