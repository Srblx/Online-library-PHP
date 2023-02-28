<?php
//&Connection a la BDD
try {
    $connect = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $connect->query("SET NAMES 'utf8'");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de la connexion. Erreur[' . $e->getCode() . '] : [' . $e->getMessage() . ']<p>');
}
