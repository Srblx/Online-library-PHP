
<?php
// Connexion à la base de données
try {
    $db = new PDO('mysql:host=localhost;dbname=bibliotheque','root', '');
    $db->query("SET NAMES 'utf8'");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de connection. Erreur['.$e->getCode().'] : ['.$e->getMessage().'<p>');
}

// Récupération des données envoyées via le formulaire
$email = $_POST["mail"];
$newPassword = $_POST["newMdp"];
$confirmPassword = $_POST["ConfNewMdp"];

// Vérification que les mots de passe sont identiques
if ($newPassword !== $confirmPassword) {
    // Redirection vers la page d'erreur de réinitialisation du mot de passe
    die('Les mot de passe ne corresponde pas !');
}

// Hashage du mot de passe avant de le stocker en base de données
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Préparation de la requête SQL pour récupérer l'utilisateur correspondant à l'adresse e-mail
$stmt = $db->prepare("SELECT * FROM user WHERE mail = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

// Vérification que l'utilisateur existe
if ($user) {
    // Préparation de la requête SQL pour mettre à jour le mot de passe de l'utilisateur
    $stmt = $db->prepare("UPDATE user SET mdp = ? WHERE id = ?");
    $stmt->execute([$hashedPassword, $user["id"]]);
    // Redirection vers la page index.php
    header("Location: index.php?passwordUpdated=1");
    exit;
} else {
    // Redirection vers la page d'erreur de réinitialisation du mot de passe
    die('L\'utilisateur n\'existe pas !');
}
?>