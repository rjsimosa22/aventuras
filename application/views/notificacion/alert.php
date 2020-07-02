<!--Alerta para modificaciones-->
<div class="siDiv">
    <?php if ($this->session->flashdata('modno') == true) { ?>

            <div align="center">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> <?= $this->session->flashdata('modno')?>
                </div>
            </div>    

    <?php } elseif ($this->session->flashdata('modsi') == true) { ?>

            <div align="center">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Bien hecho!</strong> <?= $this->session->flashdata('modsi')?>
                </div>
            </div>

    <?php } ?>
<!--Fin-->

<!--Alerta para registrar-->
    <?php if ($this->session->flashdata('regno') == true) { ?>

            <div align="center">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> <?= $this->session->flashdata('regno')?>
                </div>
            </div>    

    <?php } elseif ($this->session->flashdata('regsi') == true) { ?>

            <div align="center">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Bien hecho!</strong> <?= $this->session->flashdata('regsi')?>
                </div>
            </div>

    <?php } ?>
<!--Fin-->

<!--Alerta para inactivar-->
    <?php if ($this->session->flashdata('incno') == true) { ?>

            <div align="center">
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Error!</strong> <?= $this->session->flashdata('incno')?>
                </div>
            </div>    

    <?php } elseif ($this->session->flashdata('incsi') == true) { ?>

            <div align="center">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>¡Bien hecho!</strong> <?= $this->session->flashdata('incsi')?>
                </div>
            </div>

    <?php } ?>
</div>   
<!--Fin-->

