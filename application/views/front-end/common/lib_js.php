            </main>
        </div>
        
        <footer>
            <div class="container margin_60_35">
                <div class="row">
                    <div class="col-lg-5 col-md-12 p-r-5">
                        <h3><span class="color-titulo">¿ Quiénes somos ?</span></h3>
                        <p align="justify">Aventuras Tours nace como una agencia de turistismo enfocado en brindar la mejor experiencia al aventurero, se trata de poder conocer los destinos al máximo, con sus encantos, sus comidas y sus amores.</p>
                        <div class="follow_us">
                            <ul>
                                <li>Síguenos en</li>
                                <li><a href="https://www.facebook.com/AventurasdelPeru" target="_blank"><i class="icon-facebook"></i></a></li>
                                <li><a href="https://twitter.com/AventurasPeru1" target="_blank"><i class="icon-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/aventurasdelperu_tours/" target="_blank"><i class="icon-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 ml-lg-auto">
                        <h4>Soporte</h4>
                        <ul class="links">
                            <li><a href="#0">Centro de ayuda</a></li>
                            <li><a href="#">Politicas de privacidad</a></li>
                            <li><a href="<?= site_url("hoja/reclamo/");?>" target="_blank">Libro de reclamación</a></li>
                            
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4>Contacte con nosotros</h4>
                        <ul class="contacts">
                            <li><a href="https://api.whatsapp.com/send?phone=51979180559&text=Hola%20me%20brindas%20informaci%C3%B3n%20sobre%20el%20paquete%20que%20vi%20en%20la%20web&source=&data=" target="_blank"><i class="icon-phone"></i>+51 910 926 882</a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=51979180559&text=Hola%20me%20brindas%20informaci%C3%B3n%20sobre%20el%20paquete%20que%20vi%20en%20la%20web&source=&data=" target="_blank"><i class="icon-phone"></i>+51 979 180 559</a></li>
                            <li><a href="mailto:info@aventuras.pe"><i class="icon-email"></i> info@aventuras.pe</a></li>
                        </ul>
                    
                    </div>
                </div>
                <!--/row-->
                <hr>
                <div class="row">
                    <div class="col-lg-6">
                        <ul id="footer-selector">
                            <li>
                                <div class="styled-select" id="lang-selector">
                                    <select>
                                        <option value="English" selected>Español</option>
                                        <!--option value="French">French</option>
                                        <option value="Spanish">Spanish</option>
                                        <option value="Russian">Russian</option-->
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="styled-select" id="currency-selector">
                                    <input type="hidden" name="monedas" id="monedas" value="<?= $moneda;?>">
                                    <select onchange="location=this.value;" name="monedasjs" id="tipo_moneda">
                                        <?php
                                            foreach($monedas as $row) {
                                                $activo='';
                                                if($monedaI->id==$row->id) {
                                                    $activo='selected';
                                                }
                                                
                                                if($row->id=='1') {
                                                    $link=$url;
                                                } else {
                                                    $link=$url.''.strtolower($row->simbolo_act);
                                                }
                                                echo '<option value="'.site_url($link).'" '.$activo.'>'.$row->simbolo.'</option>';
                                            }
                                        ?>        
                                    </select>
                                </div>
                            </li>
                            <li><img src="<?= base_url();?>public/front-end/img/cards_all.svg" alt=""></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul id="additional_links">
                            <li><span>© <?= date('Y');?> Aventuras Tours</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--/footer-->
        <div id="toTop"></div><!-- Back to top button -->
        <!-- Chat cariito-->
        <?php if($this->session->userdata('listado_compra')!='') { ?><a href="<?= site_url("cliente/reserva/$moneda");?>" title="Resumen de reserva en aventuras"><div id="toTopCompra" class="chat-expancion" style="display:none;"><i class="icon-cart"></i><div class="count-carrito cantidad_servicios"><?= count($this->session->userdata('listado_compra'));?></div></div></a><?php }?>
        <!-- Chat whatssap-->
        <a href="https://api.whatsapp.com/send?phone=51979180559&text=Hola%20me%20brindas%20informaci%C3%B3n%20sobre%20el%20paquete%20que%20vi%20en%20la%20web&source=&data=" target="_blank"><div id="toTopWhat" class="chat-expancion" style="display:none;" title="Contactar con aventuras"></div></a><!-- Back to whatssap button -->
        <!-- Chat llamada-->
        <a href="tel://+51910926882" target="_blank"><div id="toTopLlamada" class="chat-expancion" style="display:none;" title="Contactar con aventuras"></div></a><!-- Back to whatssap button -->
        
        <!-- Chat facebook -->
        <!--a href="https://m.me/AventurasdelPeru" target="_blank"><div id="toTopFace" class="chat-expancion" style="display:none;"></div></a--><!-- Back to facebook button -->
        
        <!--section class="chat-container chat-expancion" style="display:none;">
            <div class="chat-button">
                Chat
            </div>
            <div class="chat-content">
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAventurasdelPeru&tabs=messages&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&app Id" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
            </div>
        </section-->

        <!-- COMMON SCRIPTS -->
        <?php if(!isset($variable)) { ?><script src="<?= base_url();?>public/front-end/js/jquery-1.12.4.js?v=<?= time();?>"></script><?php }?>
        <script src="<?= base_url();?>public/front-end/js/jquery-ui.js?v=<?= time();?>"></script>
        <script src="<?= base_url();?>public/front-end/js/common_scripts.js?v=<?= time();?>"></script>
        <script src="<?= base_url();?>public/front-end/js/main.js?v=<?= time();?>"></script>
    
        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $(".chat-expancion").fadeIn('');
                },2000);
            });
        </script>
    </body>
</html>