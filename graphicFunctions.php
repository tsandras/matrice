<?php
  function getInputHTML($idInput) {
    return "<input type=\"number\" id=\"$idInput\">";
  }

  function getInputLabelHTML($idInput, $text) {
    return "<div><label for=\"$idInput\">$text</label><input type=\"number\" id=\"$idInput\"></div>";
  }

  function getInformationInputForMatrice($name) {
    $out = "<div class=\"nm-matrice span6\">";
    $out .= getInputLabelHTML("l$name", "Lignes de $name :");
    $out .= getInputLabelHTML("c$name", "Colonnes de $name :");
    $out .= "</div>";
    return $out;
  }

  function getInformationInputForOrder($name) {
    $out = "<div class=\"nm-matrice\">";
    $out .= getInputLabelHTML("l$name", "Ordre de $name :");
    $out .= "</div>";
    return $out;
  }

  function getSubmit($id, $name) {
    return "<div><input type=\"submit\" class=\"btn btn-primary\" id=\"$id\" value=\"$name\"></div>";
  }

  function getMatrice($name, $l, $c) {
    $out = "<div class=\"matrice\" id=\"$name\">";
    for ($i = 0; $i < $l; $i++) {
      for ($j = 0; $j < $c; $j++) {
        $out .= getInputHTML("$name;$i;$j");
      }
      $out .= "<br />";
    }
    $out .= "</div>";
    return $out;
  }

  function getMatriceCarre($name, $n) {
    $out = "<div class=\"matrice\" id=\"$name\">";
    for ($i = 0; $i < $n; $i++) {
      for ($j = 0; $j < $n; $j++) {
        $out .= getInputHTML("$name;$i;$j");
      }
      $out .= "<br />";
    }
    $out .= "</div>";
    return $out;
  }

  function getVector($name, $n) {
    $out = "<div class=\"matrice\" id=\"$name\">";
    for ($i = 0; $i < $n; $i++) {
      $out .= getInputHTML("$name;$i;0");
      $out .= "<br />";
    }
    $out .= "</div>";
    return $out;
  }

  function getInfosCellule($idInput) {
    $tmp = explode(";", $idInput);
    $out["name"] = $tmp[0];
    $out["l"] = $tmp[1];
    $out["c"] = $tmp[2];
    return $out;
  }

  function showMatrice($matrice) {
    $out = "";
    foreach ($matrice as $lignes) {
      foreach ($lignes as $value) {
        $out .= "|".$value;
      }
      $out .= "|<br />";
    }
    return $out;
  }

  function showVector($vector) {
    $out = "";
    foreach ($vector as $value) {
      $out .= $value."<br />";
    }
    return $out;
  }
?>
