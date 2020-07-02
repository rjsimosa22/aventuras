<script src="<?= base_url();?>public/front-end/js/inicio.js?v=<?= time();?>"></script>
<script src="<?= base_url();?>public/front-end/js/intlTelInput.js?v=<?= time();?>"></script>
<script src="<?= base_url();?>public/front-end/js/defaultCountryIp.js?v=<?= time();?>"></script>
<script src="<?= base_url();?>public/front-end/js/isValidNumber.js?v=<?= time();?>"></script>

<?php 
    if($titulo!="Aventuras Tours" && $titulo!="Hoja de reclamación" && $titulo!="Introduce tus datos para hacer la reserva - Aventuras" && $titulo!="Realizar pago - Aventuras" && $titulo!='Su pago se procesó exitosamente  - Aventuras') {
        echo '<script src="'.base_url().'public/front-end/js/input_qty.js"></script>';
    }
?>