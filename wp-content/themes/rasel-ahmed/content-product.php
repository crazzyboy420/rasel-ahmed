<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<?php
global $woocommerce;
$currency = get_woocommerce_currency_symbol();
?>

<li <?php wc_product_class( '', $product );
   $idd = get_the_ID();
        $_product = wc_get_product($idd);
        $ragular_price = $_product->get_regular_price();
        $sele = $_product->get_price();
        if (!empty($ragular_price && $ragular_price != $sele)) {
            $ragular = $currency . $ragular_price .'.00';
        } else {
            $ragular = '';
        }
        $giro = '.00';
 ?>>

             <div class="wowshop-slingle-product">
             	<span><?php remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail', 10 );?></span>
                <div class="product-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium')?>)">
                <div class="product-purses">
                <?php if( $product->is_type( 'variable' ) ): ?>
                	<div class="variable-product">
                		<a href="#" class="button yith-wcqv-button" data-product_id="<?php echo $idd ?>"><i class="fas fa-search-plus"></i></a>

		                    <?php echo do_shortcode("[yith_wcwl_add_to_wishlist label ='<i class=\"far fa-heart\"></i>' product_added_text='' browse_wishlist_text='' already_in_wishslist_text='']")?>
		                    <a class="buy-btn" href="<?php the_permalink(); ?>"><?php echo esc_html_e( "Purchase Now", "wow-shop"); ?></a>
                	</div>
                <?php else: ?>
                	 <a href="#" class="button yith-wcqv-button" data-product_id="<?php echo $idd ?>"><i class="fas fa-search-plus"></i></a>

                    <?php echo do_shortcode("[yith_wcwl_add_to_wishlist label ='<i class=\"far fa-heart\"></i>' product_added_text='' browse_wishlist_text='' already_in_wishslist_text='']")?>


                      <a href="<?php echo site_url(); ?>/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity='1' class='button product_type_simple add_to_cart_button ajax_add_to_cart' data-product_id='<?php echo $idd ?>' data-product_sku='' aria-label='Add “<?php echo get_the_title()?>” to your cart' rel='nofollow'><i class='fas fa-shopping-cart'></i></a>
                   <?php endif ?>
                </div>
             </div>
                <div class="product-details">
                	<a href="<?php the_permalink();?>"><?php echo do_action( 'woocommerce_shop_loop_item_title' );?></a>
                   <div class="product-price">
                     <del><?php echo esc_html( $ragular )?></del>&nbsp &nbsp <?php echo esc_html( $currency  ) . esc_html( $sele)?><span><?php echo esc_html( $giro)?></span>
                   </div>
                   <?php if( $product->is_type( 'variable' ) ): ?>
                   <a href="<?php the_permalink(); ?>">Add To Cart <i class="fas fa-long-arrow-alt-right"></i></a>
                   <?php else: ?>
                   	<a href="?add-to-cart='<?php echo $idd ?>" data-quantity='1' class='button product_type_simple add_to_cart_button ajax_add_to_cart' data-product_id='<?php echo $idd ?>' data-product_sku='' aria-label='Add “<?php echo get_the_title()?>” to your cart' rel='nofollow'>Add To Cart <i class="fas fa-long-arrow-alt-right"></i></a>
                   <?php endif ?>
                 </div>
           </div>  

	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	//do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	//do_action( 'woocommerce_after_shop_loop_item' );
	?>
</li>
