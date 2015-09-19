<?php
  include("constantes.php");
  include("graphicFunctions.php");
  include("mathFunctions.php");

  $type = $_GET["type"];

  $matrices = buildMatrices($_GET);

  if ($type == "somme") {
    $resMatrice = sumTwoMatrice($matrices["A"], $matrices["B"]);
    $out = showMatrice($resMatrice);
  } else if ($type == "produit") {
    $resMatrice = productTwoMatrice($matrices["A"], $matrices["B"]);
    $out = showMatrice($resMatrice);
  } else if ($type == "trans") {
    $resMatrice = transposeMatrice($matrices["A"]);
    $out = showMatrice($resMatrice);
  } else if ($type == "trace") {
    $res = traceMatrice($matrices["A"]);
    $out = $res;
  } else if ($type == "gauss") {
    $vectorSolution = pivotDeGaussMethode2($matrices["A"], $matrices["B"]);
    $out = showVector($vectorSolution);
  } else {
    echo "Error";
  }
  echo $out;
?>
