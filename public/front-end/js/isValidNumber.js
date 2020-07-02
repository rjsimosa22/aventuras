////////////////////////////////////////////////////// tx_phone_client
var telInput = $("#textnumerores"),
 codAre = $("#textoutputres");

telInput.intlTelInput({
  nationalMode: true,  
  utilsScript: "../../build/js/utils.js"
});

telInput.on("keyup change", function() {
  var intlNumber = telInput.intlTelInput("getNumber");
    
  if (intlNumber != '[object Object]') {
    codAre.val(intlNumber);
  } else {
    codAre.val("");
  }
});

var reset = function() {
  telInput.removeClass("error");
};

telInput.blur(function() {
  reset();
  if ($.trim(telInput.val())) {
    if ( !telInput.intlTelInput("isValidNumber")) {
      var idtelf = 'textnumerores';  
      $('#'+idtelf).val('');
      $('#'+idtelf).focus();
      alert("El formato del teléfono ingresado es inválido.",3000,"error");
  
    }
  }
});

telInput.on("keyup change", reset);