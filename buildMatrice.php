<?php
  include("constantes.php");
  include("graphicFunctions.php");

  // To Do loops on GET attributs
  $ligneA = $_GET['lA'];
  $colonneA = $_GET['cA'];
  $ligneB = $_GET['lB'];
  $colonneB = $_GET['cB'];
  $type = $_GET['type'];

  if ($type == "somme") {
    $out = getMatrice($NAME_MATRICE_A, $ligneA, $colonneA);
    $out .= "+<br />";
    $out .= getMatrice($NAME_MATRICE_B, $ligneB, $colonneB);
    $out .= getSubmit($ID_BUTTON_CAL, $NAME_BUTTON_CAL);
    echo $out;
  } else if ($type == "produit") {
    $out = getMatrice($NAME_MATRICE_A, $ligneA, $colonneA);
    $out .= "*<br />";
    $out .= getMatrice($NAME_MATRICE_B, $ligneB, $colonneB);
    $out .= getSubmit($ID_BUTTON_CAL, $NAME_BUTTON_CAL);
    echo $out;
  } else if ($type == "trans") {
    $out = "Calcul de la transposé <br />";
    $out .= getMatrice($NAME_MATRICE_A, $ligneA, $colonneA);
    $out .= getSubmit($ID_BUTTON_CAL, $NAME_BUTTON_CAL);
    echo $out;
  } else if ($type == "trace") {
    $out = "Calcul de la trace <br />";
    $out .= getMatriceCarre($NAME_MATRICE_A, $ligneA);
    $out .= getSubmit($ID_BUTTON_CAL, $NAME_BUTTON_CAL);
    echo $out;
  } else if ($type == "gauss") {
    $out = "Résolution du système AX = B <br />";
    $out .= getMatriceCarre($NAME_MATRICE_A, $ligneA);
    $out .= getVector($NAME_MATRICE_B, $ligneA);
    $out .= getSubmit($ID_BUTTON_CAL, $NAME_BUTTON_CAL);
    echo $out;
  } else {
    echo "Error";
  }
?>
