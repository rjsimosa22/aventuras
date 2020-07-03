<meta charset="utf-8" />
<title>Aventuras - BackEnd</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Avant" />
<meta name="author" content="Ronny Simosa" />
<link rel="shortcut icon" href="<?= base_url();?>public/front-end/img/favicon.ico" type="image/x-icon">     
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/css/select2.css' /> 
<link href="<?= base_url();?>public/css/styles.min.css" rel="stylesheet" type='text/css' media="all" />
<link href="<?= base_url();?>public/css/pace.css" rel="stylesheet" type='text/css' media="all" />
<link href='<?= base_url();?>public/demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='styleswitcher' /> 
<link href='<?= base_url();?>public/demo/variations/default.css' rel='stylesheet' type='text/css' media='all' id='headerswitcher' /> 
<!--link rel="stylesheet" type="text/css" href="<?= base_url();?>public/fonts/font-awesome/css/font-awesome.min.css"-->
<!--link rel='stylesheet' type='text/css' href='<?= base_url();?>public/plugins/jqueryui-timepicker/jquery.ui.timepicker.css' /> 
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/plugins/form-daterangepicker/daterangepicker-bs3.css' /> 
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/plugins/fullcalendar/fullcalendar.css' /--> 
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/plugins/form-markdown/css/bootstrap-markdown.min.css' /> 
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/plugins/codeprettifier/prettify.css' /> 
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/plugins/form-toggle/toggles.css' />
<!--link rel="stylesheet" type="text/css" href="<?= base_url();?>public/fonts/font/css/font-awesome.min.css"-->
<link rel="stylesheet" type="text/css" href="<?= base_url();?>public/css/jquery-ui.css">
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/plugins/dropzone/css/dropzone.css' /> 
<link rel='stylesheet' type='text/css' href='<?= base_url();?>public/plugins/datatables/dataTables.css' /> 
<link rel="stylesheet" type='text/css' href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<style>
    .container{width: 100%;}
    .user-box {
        width: 100%;
        border-radius: 0 0 3px 3px;
        padding: 10px;
        position: relative;
    }
    .user-box .name {
        word-break: break-all;
        padding: 10px 10px 10px 10px;
        background: #EEEEEE;
        text-align: center;
        font-size: 20px;
    }
    .user-box form{display: inline;}
    .user-box .name h4{margin: 0;}
    .user-box img#imagePreview{width: 100%;}

    .editLink {
        position:absolute;
        top:28px;
        right:10px;
        opacity:0;
        transition: all 0.3s ease-in-out 0s;
        -mox-transition: all 0.3s ease-in-out 0s;
        -webkit-transition: all 0.3s ease-in-out 0s;
        background:rgba(255,255,255,0.2);
    }
    .img-relative:hover .editLink{opacity:1;}
    .overlay{
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
        background: rgba(255,255,255,0.7);
    }
    .overlay-content {
        position: absolute;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        top: 50%;
        left: 0;
        right: 0;
        text-align: center;
        color: #555;
    }
    .uploadProcess img{
        max-width: 207px;
        border: none;
        box-shadow: none;
        -webkit-border-radius: 0;
        display: inline;
    }
</style>

<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-44426473-2', 'hmelius.com');ga('send', 'pageview');</script>