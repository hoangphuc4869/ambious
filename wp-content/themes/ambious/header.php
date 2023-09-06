<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (is_front_page()) : ?>
        <?php bloginfo('name') ?>
        <?php elseif (is_single()) : ?>
        <?php echo wp_title('', true, ''); ?>
        <?php else : ?>
        <?php echo wp_title('', true, ''); ?>
        <?php endif ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/src/reset.css">

    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/src/header.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/src/footer.css">

    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/style.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory')?>/src/app.css">
    <?php wp_head();?>
</head>

<body <?php body_class()?>>

    <header>
        <div class="box-header">
            <div class="container-fluid custom">
                <div class="row cus_head">
                    <div class="col-6">
                        <div class="bg-header">
                            <div class="header-1">
                                <div class="menu-bar-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </div>

                                <a href="<?php bloginfo('url')?>"><img
                                        src="<?php echo get_field('logo_img','option');?>" alt=""
                                        class="img-fluid logo"></a>
                                <select class="language-change" name="language" id="lang">
                                    <option value="english">ENG</option>
                                    <option value="vietnamese">VN</option>

                                </select>
                            </div>


                            <!-- <div class="count">
                                <?php
                                global $woocommerce;
                            echo '('. $woocommerce->cart->get_cart_contents_count() . ')';
                             ?>
                            </div> -->

                            <!--  -->
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="right">
                            <div class="main-menu">
                                <?php wp_nav_menu (
                         array('theme_location' => 'menu', 'menu_class' => 'menu-pc'));?>
                                <?php echo get_search_form(); ?>
                            </div>

                            <div class="mobile-menu">
                                <?php wp_nav_menu (
                         array('theme_location' => 'menu-mobile', 'menu_class' => 'mobile'));?>
                            </div>

                            <div class="search-mobile">

                                <?php echo get_search_form(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'extended-menu',
                    'menu_class' => 'ext-menu'
                )
            )
         ?>

        <div class="menu-right">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'search')">Search</button>
                <button class="tablinks" onclick="openCity(event, 'account')">Account</button>
                <button class="tablinks position-relative" onclick="openCity(event, 'cart')">
                    Cart
                </button>
            </div>

            <div id="search" class="tabcontent">
                <div class="search-wrap">
                    <?php echo get_search_form();?>
                </div>
            </div>

            <div id="account" class="tabcontent">
                <div class="popup thank_you">
                    <i class="fa-solid fa-check"></i>
                    <p>Thank you for your subscription. <br> You will receive a confirmation email shortly.</p>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="ad3fcd6" title="account form"]');?>


            </div>

            <div id="cart" class="tabcontent">



            </div>




            <?php wp_nav_menu (
                array('theme_location' => 'menu-right', 'menu_class' => 'menu_right_'));?>


            <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
        </div>


    </header>