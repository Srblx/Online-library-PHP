<?php
session_start();

session_unset();

// Destruction de la session
session_destroy();



// Redirection vers la page d'authentification
header("Location: ../index.php");
