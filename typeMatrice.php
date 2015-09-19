<?php
  include("constantes.php");
  include("graphicFunctions.php");

  $type = $_GET['type'];
  if ($type == "somme" || $type == "produit") {
    $out = "<div class=\"row\">";
    $out .= getInformationInputForMatrice($NAME_MATRICE_A);
    $out .= getInformationInputForMatrice($NAME_MATRICE_B);
    $out .= getSubmit($ID_BUTTON_VAL, $NAME_BUTTON_VAL);
    $out .= "</div>";
    echo $out;
  } else if ($type == "trans") {
    $out = getInformationInputForMatrice($NAME_MATRICE_A);
    $out .= getSubmit($ID_BUTTON_VAL, $NAME_BUTTON_VAL);
    echo $out;
  } else if ($type == "trace") {
    $out = getInformationInputForOrder($NAME_MATRICE_A);
    $out .= getSubmit($ID_BUTTON_VAL, $NAME_BUTTON_VAL);
    echo $out;
  } else if ($type == "gauss") {
    $out = getInformationInputForOrder($NAME_MATRICE_A);
    $out .= getSubmit($ID_BUTTON_VAL, $NAME_BUTTON_VAL);
    echo $out;
  } else {
    echo "Error";
  }
?>
