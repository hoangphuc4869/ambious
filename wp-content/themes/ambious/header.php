<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title()?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <?php wp_head();?>
</head>

<body <?php body_class()?>>

    <header>
        <div class="box-header">
            <div class="container-fluid custom">
                <div class="bg-header">
                    <div class="header-1">
                        <div class="menu-bar-icon">
                            <i class="fa-solid fa-bars"></i>
                        </div>

                        <a href="<?php bloginfo('url')?>"><img src="<?php echo get_field('logo_img','option');?>" alt=""
                                class="img-fluid logo"></a>
                    </div>

                    <div class="main-menu">
                        <?php wp_nav_menu (
                         array('theme_location' => 'menu', 'menu_class' => 'menu-pc'));?>
                        <?php echo get_search_form(); ?>
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
                <button class="tablinks" onclick="openCity(event, 'cart')">Cart</button>
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
                <!-- <?php echo do_shortcode('[contact-form-7 id="63b6125" title="test"]');?> -->

            </div>

            <div id="cart" class="tabcontent">
                <?php
                do_action( 'woocommerce_before_cart' ); ?>



                <h1 class="cart-title"><?php the_title()?></h1>

                <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                    <?php do_action( 'woocommerce_before_cart_table' ); ?>

                    <div class="container shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                        cellspacing="0">
                        <!-- <thead>
            <tr>
                <th class="product-remove"><span
                        class="screen-reader-text"><?php esc_html_e( 'Remove item', 'woocommerce' ); ?></span></th>
                <th class="product-thumbnail"><span
                        class="screen-reader-text"><?php esc_html_e( 'Thumbnail image', 'woocommerce' ); ?></span></th>
                <th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
                <th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
                <th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
                <th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
            </tr>
        </thead> -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="container">
                                    <div class="row items">
                                        <?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
							/**
							 * Filter the product name.
							 *
							 * @since 2.1.0
							 * @param string $product_name Name of the product in the cart.
							 * @param array $cart_item The product in the cart.
							 * @param string $cart_item_key Key for the product in the cart.
							 */
							$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
                                        <div
                                            class="col-6 <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> ">


                                            <div class="product-remove">
                                                <?php
											echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												'woocommerce_cart_item_remove_link',
												sprintf(
													'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
													esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
													/* translators: %s is the product name */
													esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
													esc_attr( $product_id ),
													esc_attr( $_product->get_sku() )
												),
												$cart_item_key
											);
										?>
                                            </div>

                                            <div class="product-thumbnail">
                                                <?php
											$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

											if ( ! $product_permalink ) {
												echo $thumbnail; // PHPCS: XSS ok.
											} else {
												printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
											}
											?>
                                            </div>




                                        </div>
                                        <div
                                            class="col-12 <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> ">

                                            <div class="product-name"
                                                data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
                                                <?php
											if ( ! $product_permalink ) {
												echo wp_kses_post( $product_name . '&nbsp;' );
											} else {
												/**
												* This filter is documented above.
												*
												* @since 2.1.0
												*/
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
											}

											do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

											// Meta data.
											echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

											// Backorder notification.
											if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
												echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
											}
											?>
                                            </div>

                                            <div class="product-price"
                                                data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                                <?php
												echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
                                            </div>

                                            <div class="product-quantity"
                                                data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                                <?php
											if ( $_product->is_sold_individually() ) {
												$min_quantity = 1;
												$max_quantity = 1;
											} else {
												$min_quantity = 0;
												$max_quantity = $_product->get_max_purchase_quantity();
											}

											$product_quantity = woocommerce_quantity_input(
												array(
													'input_name'   => "cart[{$cart_item_key}][qty]",
													'input_value'  => $cart_item['quantity'],
													'max_value'    => $max_quantity,
													'min_value'    => $min_quantity,
													'product_name' => $product_name,
												),
												$_product,
												false
											);

											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
											?>
                                            </div>

                                            <div class="product-subtotal"
                                                data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
                                                <?php
												echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
                                            </div>

                                        </div>
                                        <?php
							}
						}
						?>



                                        <?php if ( wc_coupons_enabled() ) { ?>
                                        <div class="coupon">
                                            <label for="coupon_code"
                                                class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label>
                                            <input type="text" name="coupon_code" class="input-text" id="coupon_code"
                                                value=""
                                                placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" />
                                            <button type="submit"
                                                class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
                                                name="apply_coupon"
                                                value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply coupon', 'woocommerce' ); ?></button>
                                            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                                        </div>
                                        <?php } ?>

                                        <div>
                                            <button type="submit"
                                                class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>"
                                                name="update_cart"
                                                value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

                                            <?php do_action( 'woocommerce_cart_actions' ); ?>

                                            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>

                                            <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php do_action( 'woocommerce_cart_contents' ); ?>

                            </div>

                            <div class="col-12">
                                <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

                                <div class="cart-collaterals">
                                    <?php
					/**
					 * Cart collaterals hook.
					 *
					 * @hooked woocommerce_cross_sell_display
					 * @hooked woocommerce_cart_totals - 10
					 */
					do_action( 'woocommerce_cart_collaterals' );
					?>
                                </div>

                                <?php do_action( 'woocommerce_after_cart' ); ?>
                            </div>

                        </div>
                    </div>
                    <?php do_action( 'woocommerce_after_cart_table' ); ?>
                </form>



                ?>

            </div>




            <?php wp_nav_menu (
                array('theme_location' => 'menu-right', 'menu_class' => 'menu_right_'));?>


            <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>
        </div>


    </header>