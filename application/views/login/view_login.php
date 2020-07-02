<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<body id="signin-page" style="background-color: #faf9f9">
    <div class="page-form">
        <form action="" method="post" class="form">
            <div class="header-content"><div align="center"><img src="<?= base_url();?>public/img/emblema.jpeg" width="100%"></div></div>
            <div class="body-content"><p style="font-family:tahoma;font-size:16px;">Ingrese su usuario y clave:</p>
                
                <input type="hidden" name="url" id="url" value="<?= site_url(); ?>">
                <input type="hidden" name="url0" id="url0" value="<?= site_url('login/entrar'); ?>">
                <input type="hidden" name="url1" id="url1" value="<?= site_url('home/index'); ?>">
                
                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-user"></i><input type="text" placeholder="Usuario" name="username" id="username" class="form-control"></div>
                </div>
                
                <div class="form-group">
                    <div class="input-icon right"><i class="fa fa-key"></i><input type="password" placeholder="Clave" name="clave" id="clave" class="form-control"></div>
                </div>
                
                <div class="form-group pull-right">
                    <div style="float: right"><input type="button" id="login" name="login" value="Ingresar" style="color: #000000; line-height: 10px; height: 25px; padding: 3px; width: 90px"></div>
                </div>
                
                <span id="message" style="font-family:tahoma;font-size:14px;display: none;" class="" data-layout="center" data-type="error" data-toggle="notyfy"></span>
               
                <div class="clearfix"></div>
                
                <div class="forget-password" style="font-family:tahoma;"><h4>Olvido su clave?</h4>
                    <p style="font-family:tahoma;font-size:14px;"> click <a href='forgot.php' class='btn-forgot-pwd'>aquí</a> para recuperar su clave.</p>
                </div>

            </div>
        </form>
    </div>
</body>
