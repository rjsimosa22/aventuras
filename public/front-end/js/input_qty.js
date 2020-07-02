// Quantity buttons
function qtySum(){
	var arr=document.getElementsByName('textqtyInput');
	var tot=0;
	for(var i=0;i<arr.length;i++){
		if(parseInt(arr[i].value))
			tot+=parseInt(arr[i].value);
	}
	var cardQty=document.querySelector(".qtyTotal");
	cardQty.innerHTML=tot;
	precio=calcular_precio($('#infoPrecio1').val(),$('#textqtyAdulto').val(),$('#texttipocambio').val(),$('#monedas').val(),$('#textprecio_hotel').val(),$('#textidpaises').val(),$('#textdistrito').val());
	
	if($('#textqtyAdulto').val()=='0') {
		$('.infoPrecio').text('0');
		$('#textqtyAdulto').focus();
		$('#message-personas-adulta').text('* Selecciona un adulto o más en persona.');
    } else {
		$('#message-personas-adulta').text('');
		$('.infoPrecio').text(number_format(precio));
	}
	
	if($('#textidpaises').val()=='') {
        $('#textidpaises').focus();
        $('#message-paises').text('* Selecciona el país de residencia.');return;
    } else {
        $('#message-paises').text('');
	}
} 

function calcular_precio(infoPrecio,textqtyAdulto,texttipocambio,monedas,textprecio_hotel,textidpaises,textdistrito) {
    if(monedas=='') {
        var precio=parseFloat(infoPrecio) * textqtyAdulto;
        var precio=Math.ceil(parseFloat(precio) + parseFloat(textprecio_hotel));
    } else {
		var precio=parseFloat(infoPrecio) * textqtyAdulto;
	    precio=parseFloat(precio) + parseFloat(textprecio_hotel);
		precio=Math.ceil(parseFloat(precio) / parseFloat(texttipocambio));
	}
	
	if(textidpaises!='Perú' && textidpaises!='') {
        if(textdistrito=='cusco') { 
            var porcentaje=((precio / variableA) * variblePorciento); 
            precio=((precio) + porcentaje);
        } 
    }
    return precio;
}

function number_format(amount,decimals) {
	amount+='';
	amount=parseFloat(amount.replace(/[^0-9\.]/g, ''));

    decimals=decimals||0;

	// si es mayor o menor que cero retorno el valor formateado como numero
    amount='' + amount.toFixed(decimals);

    var amount_parts=amount.split('.'),
        regexp=/(\d+)(\d{3})/;

    while(regexp.test(amount_parts[0]))
        amount_parts[0]=amount_parts[0].replace(regexp, '$1' + ',' + '$2');

	if(isFloat(amount)) {
		return amount_parts.join('.');
	} else {
		return amount_parts[0];
	}
}

function isFloat(n) {
    return n % 1 != 0;
}

$(function() {
	$(".qtyButtons input").after('<div class="qtyInc"></div>');
	$(".qtyButtons input").before('<div class="qtyDec"></div>');
	$(".qtyDec,.qtyInc").on("click", function() {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();

		if ($button.hasClass('qtyInc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// don't allow decrementing below zero
			if (oldValue > 0) {
			var newVal = parseFloat(oldValue) - 1;
			} else {
			newVal = 0;
			}
		}
		$button.parent().find("input").val(newVal);
		qtySum();
		$(".qtyTotal").addClass("rotate-x");

	});
	function removeAnimation() { $(".qtyTotal").removeClass("rotate-x"); }
	const counter = document.querySelector(".qtyTotal");
	counter.addEventListener("animationend", removeAnimation);
});

var fecha=new Date();
fecha.setHours(fecha.getHours()+24);
$('input[name="textfecha"]').daterangepicker({
	minDate:fecha,
	"autoApply":true,
	parentEl:'#input_date',
	"singleDatePicker":true,
	"linkedCalendars":false,
	"showCustomRangeLabel":false,
	locale: {
		format:'DD/MM/YYYY',
		"customRangeLabel": "Personalizar",
		"daysOfWeek": [
			"Do",
			"Lu",
			"Ma",
			"Mi",
			"Ju",
			"Vi",
			"Sa"
		],
		"monthNames": [
			"Enero",
			"Febrero",
			"Marzo",
			"Abril",
			"Mayo",
			"Junio",
			"Julio",
			"Agosto",
			"Setiembre",
			"Octubre",
			"Noviembre",
			"Diciembre"
		]
	}
});

$(".chat-button").on('click', function(e){
	e.preventDefault();
	$(".chat-content").slideToggle('');
});

function toglediv(val) {
	var isVisible=$('#'+val).is(":visible");
	if(isVisible==false){
		$('#'+val).show();
		$('#up-'+val).show();
		$('#down-'+val).hide();
	} else {
		$('#'+val).hide();
		$('#up-'+val).hide();
		$('#down-'+val).show();
	}
}