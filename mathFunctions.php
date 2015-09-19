<?php

  function buildMatrices($gets) {
    foreach ($gets as $key => $value) {
      if ($key != "type") {
        $tabInfos = getInfosCellule($key);
        if ($tabInfos["name"] == "B" && $gets["type"] == "gauss") {
          $matrices[$tabInfos["name"]][$tabInfos["l"]] = $value;
        } else {
          $matrices[$tabInfos["name"]][$tabInfos["l"]][$tabInfos["c"]] = $value;
        }
      }
    }
    return $matrices;
  }

  function sumTwoMatrice($A, $B) {
    for ($i = 0; $i < count($A); $i++) {
      for ($j = 0; $j < count($A[$i]); $j++) {
        $out[$i][$j] = $A[$i][$j] + $B[$i][$j];
      }
    }
    return $out;
  }

// A refaire pour que cela fonctionne sur les vecteurs
  function productTwoMatrice($A, $B) {
    $l = count($B);
    for ($i = 0; $i < count($A); $i++) {
      for ($j = 0; $j < count($B[0]); $j++) {
        $tmp = 0;
        for ($k = 0; $k < $l; $k++) {
          $tmp = $tmp + ($A[$i][$k] * $B[$k][$j]);
        }
        $out[$i][$j] = $tmp;
      }
    }
    return $out;
  }

// A supprimer quand la fonction ci-dessus sera refaite
  function productMatriceVector($A, $Y) {
    $ordre = count($A);
    for ($i = 0; $i < count($A); $i++) {
      for ($j = 0; $j < count($A[$i]); $j++) {
        $tmp = 0;
        for ($k = 0; $k < $ordre; $k++) {
          $tmp = $tmp + ($A[$i][$k] * $Y[$k]);
        }
        $out[$i] = $tmp;
      }
    }
    return $out;
  }

  function transposeMatrice($A) {
    if (count($A[0]) < count($A)) {
      for ($i = 0; $i < count($A[$i]); $i++) {
        for ($j = 0; $j < count($A); $j++) {
          $out[$i][$j] = $A[$j][$i];
        }
      }
    }
    else {
      for ($i = 0; $i < count($A); $i++) {
        for ($j = 0; $j < count($A[$i]); $j++) {
          $out[$j][$i] = $A[$i][$j];
        }
      }
    }
    return $out;
  }

  function traceMatrice($A) {
    $out = 0;
    for ($i = 0; $i < count($A); $i++) {
      $out += $A[$i][$i];
    }
    return $out;
  }

// Sans les G de merde du prof
  function pivotDeGaussMethode1($A, $Y) {
    $ordre = count($A);
    for ($i = 0; $i < $ordre; $i++) {
      echangerLignesSiZeroSurLePivot($A, $Y, $i);
      for ($k = $i+1; $k < $ordre; $k++) {
          $scalaire = -$A[$k][$i]/$A[$i][$i];
          for ($j = $i; $j < $ordre; $j++) {
            $A[$k][$j] += $scalaire * $A[$i][$j];
          }
          $Y[$k] += $scalaire * $Y[$i];
      }
    }
    return resoudreTriangulaireSuperieur($A, $Y);
  }

  // Avec les G de merde du prof => comprendre : entrainement au calcule matriciel
  function pivotDeGaussMethode2($A, $Y) {
    $ordre = count($A);
    for ($i = 0; $i < $ordre; $i++) {
      echangerLignesSiZeroSurLePivot($A, $Y, $i);
      // To do : sauvegarder toute les versions intermediaire de G, A, Y.
      $G = fabriquerG($A, $i);
      $A = productTwoMatrice($G, $A);
      $Y = productMatriceVector($G, $Y);
    }
    return resoudreTriangulaireSuperieur($A, $Y);
  }

  ///////////////////////////// Fonctions "private" /////////////////////////////

  // Pas encore obtimise
  function fabriquerG($A, $col) {
    $ordre = count($A);
    for ($i = 0; $i < $ordre; $i++) {
      for ($j = 0; $j < $ordre; $j++) {
        if ($i == $j) {
          $out[$i][$j] = 1;
        } else if ($j < $i && $j == $col) {
          $out[$i][$j] = -$A[$i][$j]/$A[$col][$col];
        } else {
          $out[$i][$j] = 0;
        }
      }
    }
    return $out;
  }

  function resoudreTriangulaireSuperieur($T, $Y) {
    $X = array_fill(0, count($T), 0);
    for ($i = count($T)-1; $i > -1; $i--) {
        $X[$i] = $Y[$i]/$T[$i][$i];
        for ($k = $i-1; $k > -1; $k--) {
            $Y[$k] -= $T[$k][$i] * $X[$i];
        }
    }
    return $X;
  }

  function echangerLignesSiZeroSurLePivot(&$A, &$Y, $i) {
    if ($A[$i][$i] == 0) {
      for ($j = $i+1; $j < count($A); $j++) {
        if ($A[$j][$i] != 0) {
          echangerLignes($A, $Y, $i, $j);
        }
      }
    }
  }

  function echangerLignes(&$A, &$Y, $numLigne1, $numLigne2) {
    $tmp = $A[$numLigne1];
    $A[$numLigne1] = $A[$numLigne2];
    $A[$numLigne2] = $tmp;
    $tmp = $Y[$numLigne1];
    $Y[$numLigne1] = $Y[$numLigne2];
    $Y[$numLigne2] = $tmp;
  }

?>
