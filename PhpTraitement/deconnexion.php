<?php
session_start();

// Détruit toutes les variables d'une session
session_unset();
//cooki ou set_cookies 
//! strtotime fonction a voir 
// Destruction de la session
session_destroy();

// Redirection vers la page d'authentification
header("Location: ../index.php");
