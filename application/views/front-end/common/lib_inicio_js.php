<script src="<?= base_url();?>public/front-end/js/inicio.js"></script>
<script src="<?= base_url();?>public/front-end/js/intlTelInput.js"></script>
<script src="<?= base_url();?>public/front-end/js/defaultCountryIp.js"></script>
<script src="<?= base_url();?>public/front-end/js/isValidNumber.js"></script>

<?php 
    if($titulo!="Aventuras Tours" && $titulo!="Hoja de reclamación" && $titulo!="Introduce tus datos para hacer la reserva - Aventuras" && $titulo!="Realizar pago - Aventuras" && $titulo!='Su pago se procesó exitosamente  - Aventuras') {
        echo '<script src="'.base_url().'public/front-end/js/input_qty.js"></script>';
    }
?>