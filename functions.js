var ID_BUTTON_VAL = "#ok";
var ID_BUTTON_CAL = "#calculer";
var INPUT_TO_LOOPS_FOR_LC = ".nm-matrice input";
// var INPUT_TO_LOOPS_FOR_CAL = ".matrice input";

function manageSelectType(inputListener) {
  $(inputListener).click(function(){
    var type = $(this).val();
    $.ajax({url:"typeMatrice.php?type="+type+"", success:function(result){
      $("#select-colonne-ligne").html(result);
      $("#select-values").html("");
      $("#show-solution").html("");
      manageSelectBuildMatrice(ID_BUTTON_VAL, INPUT_TO_LOOPS_FOR_LC, type);
    }});
  });
}

function manageSelectBuildMatrice(inputSubmit, listToListener, type) {
  $(inputSubmit).click(function() {
    var params = "";
    $(listToListener).each(function() {
      params += $(this).attr("id") + "=" + $(this).val() + "&";
    });
    params += "type="+type+"";
    $.ajax({url:"buildMatrice.php?"+params+"", success:function(result){
      $("#select-values").html(result);
      $("#show-solution").html("");
      manageSelectValueMatrice(ID_BUTTON_CAL, type);
    }});
  });
}

function manageSelectValueMatrice(inputSubmit, type) {
  $(inputSubmit).click(function() {
    var params = "";
    $("#A").children("input").each(function() {
      params += $(this).attr("id") + "=" + $(this).val() + "&";
    });
    if (type == "somme" || type == "produit" || type == "gauss") {
      $("#B").children("input").each(function() {
        params += $(this).attr("id") + "=" + $(this).val() + "&";
      });
    }
    params += "type="+type+"";
    $.ajax({url:"solveMatrice.php?"+params+"", success:function(result){
      $("#show-solution").html(result);
    }});
  });
}
