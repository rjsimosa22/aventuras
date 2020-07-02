<main>
    <div class="hero_in cart_section last">
        <div class="wrapper">
            <div class="container">
            <h3 class="titulo-carrito">RESUMEN LIBRO DE RECLAMACIÓN</h3>
                <!-- End bs-wizard -->
                <div id="confirm">
                    <h4>Reclamo Completado!</h4>
                    <p>Sr o Sra. <?= ucwords($nombre);?>, recibirá la confirmación de su reclamo al siguiente correo: <?= $email;?></p>
                </div>
                <br>
                <a href="<?= site_url($moneda);?>" class="btn_1" style="background:#ffc107;color:#000;">Ir a inicio</a>
                <br><br>
            </div>
        </div>
    </div>
</main>
