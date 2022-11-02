<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rasel-ahmed
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php echo get_template_directory_uri();?>/assets/img/favicon-con.png" type="img/png" sizes="70x70">
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>
<?php
$custom_log =  get_theme_mod( 'custom_logo' );
$custom_logo_array =  wp_get_attachment_image_src( $custom_log, 'full' );

 ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'rasel-ahmed' ); ?></a>

	<header id="masthead" class="site-header">
	<div id="mobile-menu"></div>
    <div id="preloader"></div>
    <div class="header-area">
        <div class="container">
            <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <?php if(!empty($custom_log)):
                            $image_url = $custom_logo_array[0]; 
                                ?>
                                
                                <a href="<?php echo esc_url(home_url('/'))?>"><img src="<?php echo esc_url($image_url) ?>" alt="logo"></a>
                            <?php else: ?>
                           <h3><a href="<?php echo esc_url(home_url('/')) ?>"><?php echo esc_html( bloginfo('name') ); ?></a></h3>
                           <?php endif;?>
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="nav-bar">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                )
                            );
                        ?>
                       </div>
                    </div>
                  <div class="col-md-3">
                     <div class="logout">
                          <a href="assets/file/my-resume.pdf">Resume</a>
                     </div>
                 </div>
                  <div class="social-icon">
                       <ul>
                           <li><a href=""><i class="fab fa-twitter"></i></a></li>
                           <li><a href=""><i class="fab fa-instagram"></i></a></li>
                           <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                           <li><a href=""><i class="fab fa-medium"></i></a></li>
                           <li><a href=""><i class="fab fa-pinterest"></i></a></li>
                       </ul>
                   </div>
            </div>
        </div>
    </div>
	</header><!-- #masthead -->
