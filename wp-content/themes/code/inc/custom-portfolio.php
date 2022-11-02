<?php

//Custom Post type

function custom_portfolio() {
	$labels = array(
		'name'               => _x( 'Portfolios', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Portfolios', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Amit', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Portfolio', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Portfolio', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Portfolio', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Portfolio', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Portfolio', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Portfolios', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Portfolios', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Portfolios found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Portfolios found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 10,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'portfolio', $args );
}
add_action( 'init', 'custom_portfolio' );


// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Portfolios', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Portfolio', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Portfolios', 'textdomain' ),
		'all_items'         => __( 'All Portfolios', 'textdomain' ),
		'parent_item'       => __( 'Parent Portfolio', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Portfolio:', 'textdomain' ),
		'edit_item'         => __( 'Edit Portfolio', 'textdomain' ),
		'update_item'       => __( 'Update Portfolio', 'textdomain' ),
		'add_new_item'      => __( 'Add New Portfolio', 'textdomain' ),
		'new_item_name'     => __( 'New Portfolio Name', 'textdomain' ),
		'menu_name'         => __( 'Portfolio', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio' ),
	);

	register_taxonomy( 'Portfolio', array( 'portfolio' ), $args );
	
}
	
add_action( 'init', 'create_portfolio_taxonomies', 0 );

//Tags


function create_portfolio_tags() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Portfolios Tags', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Portfolio Tags', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Portfolios Tags', 'textdomain' ),
		'all_items'         => __( 'All Portfolios Tags ', 'textdomain' ),
		'parent_item'       => __( 'Parent Portfolio Tags', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Portfolio Tags:', 'textdomain' ),
		'edit_item'         => __( 'Edit Portfolio Tags ', 'textdomain' ),
		'update_item'       => __( 'Update Portfolio Tags', 'textdomain' ),
		'add_new_item'      => __( 'Add New Portfolio Tags', 'textdomain' ),
		'new_item_name'     => __( 'New Portfolio Name Tags', 'textdomain' ),
		'menu_name'         => __( 'Portfolio Tags', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'tags' ),
	);

	register_taxonomy( 'tags', array( 'portfolio'), $args );
	
}
	
add_action( 'init', 'create_portfolio_tags', 0 );


// Create custom Metabox


function portfolio_add_meta_box(){
	
	
	
	add_meta_box(
	
		'portfolio_section_id', //id 
		'Portfolio Metabox', //title
		'portfolio_section_callback', //callback
		'portfolio', //screen
		'normal', //context
		'default' //priority
	);
}
add_action('add_meta_boxes','portfolio_add_meta_box');
	

	
function portfolio_section_callback($post){ 

 wp_nonce_field('portfolio_meta_box','portfolio_meta_box_nonce');

$title =get_post_meta($post->ID,'title',true);

?>
	
	
	<p>
	<label>Title</label>
	<input type="text" name="title" value="<?php echo $title;?>"/>	
	</p>
	
<?php }

function portfolio_save_meta($post_id){
	
// Check if our nonce is set.


	if ( ! isset( $_POST['portfolio_meta_box_nonce'] ) ) {
		return;
	}
	
		
	// Verify that the nonce is valid.
	
		if ( ! wp_verify_nonce( $_POST['portfolio_meta_box_nonce'], 'portfolio_meta_box' ) ) {
		return;
	}
	
	
// Make sure that it(input) is set.
	if ( ! isset( $_POST['title'] ) ) {
		return;
	}
	
	
	// Sanitize user input.
	$my_title = sanitize_text_field( $_POST['title'] );	

	// Update the meta field in the database.
	update_post_meta( $post_id, 'title', $my_title );
	
	
}
add_action( 'save_post', 'portfolio_save_meta' );
	
?>























