<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styledark.css">
    <script src="js/dark.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="light">   

    <?php include "acceuil.php";?>
<?php
   
    //~ Connexion a ma base de données my-db
    //&Fonction de connexion mysqli_connect(4 parametres pour effectuer la connexion )
try {
    $conn = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', '');
    $conn->query("SET NAMES 'utf8'");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<p> Echec de la connexion. Erreur[' . $e->getCode() . '] : [' . $e->getMessage() . ']<p>');
}

    //& Requête pour récupérer les données de la table 'livre'
    $requete = "SELECT * FROM livre";
    //& Préparation de la requête
    $result = $conn->prepare($requete);
    //& Exécution de la requête
    $result->execute();


  
//~ Pour afficher les données de la bdd dans un tableau 
echo '<table border=1, class="styleTab" >';
echo '<tr class="key">';
echo '<td class="td">' . '<b>' .  'ISBN ' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' .  'Titre ' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' .  'Thème ' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' .  'Nombre Pages' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' .  'Format' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' . 'Nom auteur' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' . 'Prénom auteur' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' . 'Editeur' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' . 'Année d\'édition' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' . 'Prix' . '</b>' . '</td>';
echo '<td class="td">' . '<b>' . 'Langue' . '</b>' . '</td>';

if ($_SESSION['role'] === 1 ) {
    //~ Si l'utilisateur est un administrateur, afficher les deux dernières colonnes
    echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
    echo '<td class="td">' . '<b>' . '' . '</b>' . '</td>';
}

echo '</tr>';

while ($donnees = $result->fetch(PDO::FETCH_OBJ)) {
    //& $donnees recuperé avec la fonction ci dessus (ATTENTION array pas SENSIBLE a la CASSE)
    //~ Les valeurs que j'affiche dans le tableau
    echo '<tr class="value">';
    echo '<td class="td">' . $donnees->isbn . "  " . '</td>';
    echo '<td class="td">' . $donnees->titre . "  " . '</td>';
    echo '<td class="td">' . $donnees->theme . " " . '</td>';
    echo '<td class="td">' . $donnees->nombreDePage . " " . '</td>';
    echo '<td class="td">' . $donnees->format . " " . '</td>';
    echo '<td class="td">' . $donnees->nomAuteur . " " . '</td>';
    echo '<td class="td">' . $donnees->prenomAuteur . " " . '</td>';
    echo '<td class="td">' . $donnees->editeur . " " . '</td>';
    echo '<td class="td">' . $donnees->anneeEdition . " " . '</td>';
    echo '<td class="td">' . $donnees->prix . " " . '</td>';
    echo '<td class="td">' . $donnees->langue . " " . '</td>';
    
    if ($_SESSION['role'] === 1 ) {
        //~ Si l'utilisateur est un administrateur, afficher les deux dernières colonnes
        echo '<td><a href="modifierLigne.php?id=' . $donnees->id . '"><i class="fa-solid fa-pen"></i></a></td>';
        echo "<td style='text-align:center;'><a href='javascript:void(0)' onclick='confirmDelete(" . $donnees->id . ")' style='color: red;'><i class='fa fa-trash'></i></a></td>";    
    }

    echo '</tr>';
    
    }
    echo '</table>';
    

    //~ Cloture de la connexion a la base de données 
    // mysqli_close($conn);
    ?>
    <script>
        function confirmDelete(id) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce livre ?")) {
                window.location.href = "addDelete.php?id=" + id ;
            }
        }
    </script>
    <?php include "footer.php" ?>
</body>

</html>