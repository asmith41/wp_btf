<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>BT Finance</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/main.css">
    <script src="<?php echo get_template_directory_uri();?>/assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/flexslider.css" type="text/css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css">

    
    <script src="<?php echo get_template_directory_uri();?>/assets/js/vendor/jquery-1.11.1.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.flexslider.js"></script>
</head>
<script type="text/javascript">
    $(window).load(function() {
        $('#close_consult').click(function(){
        $('.bookConsult').hide(); 
        sessionStorage.setItem('key', 1);
    });
        if(sessionStorage.getItem('key')==1){
            $('.bookConsult').hide(); 
        } 
});
</script>
<body>
    <div class="topBar">
        <div class="container">
            <div class="row">
                <div class="topBarLinks">
                    <a class="phoneNum" href="#"><?php echo get_option('contact_num'); ?></a>
                    <a class="clientLogin" href="#">CLIENT LOGIN</a>
                <!-- Book plugin only for home page -->
                <?php if ( is_front_page() ):
                   echo do_shortcode('[Book_shortcode]'); 
                endif; ?>
            </div>
        </div>
    </div>
    <header role="banner">
        <div class="container-fluid">
            <div class="row">
            <div class="col-lg-3 col-sm-2 col-xs-12">
                    <div class="navbar-header">
                        <a href="#">
                            <img src="<?php echo get_theme_mod("logo") ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-sm-10 col-xs-12">
                  <nav class="navbar navbar-default full-width" role="navigation">
                    <div class="container-fluid right">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                       <?php
                       $defaults = array(
                        'theme_location'  => 'navbar',
                        'menu_class'      => 'nav navbar-nav ',
                        'depth'           => 0, 
                        );

                        ?>
                        <?php wp_nav_menu($defaults);?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <!--/.navbar-collapse -->
    </div>
</div>
</header>