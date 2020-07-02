<main>
    <div class="hero_in cart_section last">
        <div class="wrapper">
            <div class="container">
            <h3 class="titulo-carrito">RESUMEN DE RESERVAS EN AVENTURAS</h3>
                <div class="bs-wizard clearfix">
                    <div class="bs-wizard-step">
                        <div class="text-center bs-wizard-stepnum">Revisa tu pedido</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step">
                        <div class="text-center bs-wizard-stepnum">Datos personales</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Realizar pago</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#" class="bs-wizard-dot"></a>
                    </div>
                </div>
                <!-- End bs-wizard -->
                <div id="confirm">
                    <h4>Orden Finalizada!</h4>
                    <p>Sr o Sra. <?= ucwords($datos_personales[0]['textnombresres'].' '.$datos_personales[0]['textapellidosres']);?>, recibirá la confirmación de su compra al siguiente correo: <?= $datos_personales[0]['textemailres'];?></p>
                </div>
                <br>
                <a href="<?= site_url($moneda);?>" class="btn_1" style="color:#000;background:#fff;border:1px solid #fff;">Ir a inicio</a>
                <br><br>
            </div>
        </div>
    </div>
</main>
