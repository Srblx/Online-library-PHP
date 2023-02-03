// Compare la longueur de deux tableau nommé

<?php
  $tab1 = array("a", "b", "f", "g");
  $tab2 = array("a", "b", "c", "d", "e");
   
  // Comparer les valeurs
  $cmp = array_diff($tab1, $tab2);
  print_r($cmp);
?>

Sortie :

Array (
[2] => f
[3] => g
)
