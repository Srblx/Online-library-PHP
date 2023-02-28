<?php
require '../config.php';

// Vérifier que toutes les données requises sont entrées correctement
if (empty($_POST['code_fournisseur']) || empty($_POST['pays']) || empty($_POST['tel_fournisseur']) || empty($_POST['mail_fournisseur'])) {
    echo "<script type='text/javascript'>";
    echo "alert('Veuillez entrer toutes les données requises')";
    echo "</script>";
    exit();
}

// Valider les données entrées par l'utilisateur
$code = validate_input($_POST['code_fournisseur']);
$raisonSoc = validate_input($_POST['raison_sociale']);
$adress = validate_input($_POST['rue_fournisseur']);
$codePostal = validate_input($_POST['code_postal']);
$localite = validate_input($_POST['localite']);
$pays = validate_input($_POST['pays']);
$telephone = validate_input($_POST['tel_fournisseur']);
$site = validate_input($_POST['url_fournisseur']);
$mail = validate_input($_POST['mail_fournisseur']);
$fax = validate_input($_POST['fax_fournisseur']);

// Préparer la requête
$stmt = $conn->prepare("INSERT INTO fornisseur (code_fournisseur,raison_social,rue_fournisseur,code_postal,localite,pays,tel_fournisseur,url_fournisseur,mail_fournisseur,fax_fournisseur) 
VALUES (:code, :raison_soc, :rue_fournisseur, :code_postal, :localite, :pays, :tel_fournisseur, :url_fournisseur, :mail_fournisseur, :fax_fournisseur)");

// Lier les variables aux marqueurs
$stmt->bindParam(':code', $code);
$stmt->bindParam(':raison_soc', $raisonSoc);
$stmt->bindParam(':rue_fournisseur', $adress);
$stmt->bindParam(':code_postal', $codePostal);
$stmt->bindParam(':localite', $localite);
$stmt->bindParam(':pays', $pays);
$stmt->bindParam(':tel_fournisseur', $telephone);
$stmt->bindParam(':url_fournisseur', $site);
$stmt->bindParam(':mail_fournisseur', $mail);
$stmt->bindParam(':fax_fournisseur', $fax);

if ($stmt->execute()) {
    // fonction header(location:) permet de renvoyer vers la page voulue après soumission du formulaire
    header('location: ../afficherFournisseur.php');
} else {
    echo "Insertion impossible. Veuillez réessayer ! <br>";
    echo ' <a href="ajouterFournisseur.php">Retourner au formulaire</a>';
}

function validate_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
