<?php

//---------------------------------------------------
// Begin :work-taxonomy1 (Home Page1)
//---------------------------------------------------		
add_shortcode('work_taxonomy1','prothoma_work_taxonomy1');
function prothoma_work_taxonomy1($attr, $content = null){ 
	extract( shortcode_atts(
	array(
		'work_taxonomy1_pst_num'		=> '',
		'work1_btn_color_change'		=> '',
		'work1_btn_actv_color_change'		=> '',
		'p1_all_btn'		=> '',
	), $attr)
	);
	
	ob_start();
	?>
	<style>
	.pro-h1.prothoma-menu button.active {
		color: <?php echo esc_html($work1_btn_actv_color_change);?>;
	}
	.pro-h1.prothoma-menu button {
    color: <?php echo esc_html($work1_btn_color_change);?>}
	</style>
	
	
	<!-- Masonry Start -->
	<div id="masonry">
		<div class="masonry text-center">
			<div class="container">
				<div class="prothoma-menu pro-h1">
					<div class="toggle">
					
						<button class="active" data-filter="*">
							<span class="text">
							<?php if(!empty($p1_all_btn)){
									echo esc_html($p1_all_btn);
								}else{
									echo esc_html__('ALL','prothoma-theme');
								}?>
							</span>
						</button>
						
						
						<?php 
							$terms = get_terms( 'work1_texonomy' );
								if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
									foreach ( $terms as $term ) {
								?>		
									<button data-filter=".<?php echo esc_attr($term->slug);?>"><span class="text"><?php echo esc_html($term->name);?></span></button>
								<?php		
									}
								}
							?>
					</div>
				</div><!-- /.prothoma-menu -->

				<div class="prothoma-container portfolio-1 pro-h1">
					<div class="prothoma-sizer"></div>
					
					<?php 
						$prothoma_work_post = new WP_Query(array(
												'post_type'=>'work1_custom_post',
												'taxonomy'=>'work1_texonomy',
												'posts_per_page'=>$work_taxonomy1_pst_num,
												));
						if($prothoma_work_post->have_posts()) : while($prothoma_work_post->have_posts()) : $prothoma_work_post->the_post();
						
						$work1_var = get_post_meta(get_the_ID(), 'work1_masonry', true );
						
						$att_ID = get_post_thumbnail_id(get_the_ID());
						$terms = get_the_terms( get_the_ID(), 'work1_texonomy' );
		 
							if ( $terms && ! is_wp_error( $terms ) ) :
								$draught_links = array();
								foreach ( $terms as $term ) {
									$draught_links[] = $term->slug;
								}					 
								$on_draught = join( " ", $draught_links );
								?>
							<?php endif; ?>
							<div class="prothoma-item <?php echo $work1_var['port_image_size'];?> <?php echo esc_html( $on_draught); ?>">
								<div class="ehover">
									<img src="<?php echo esc_url(wp_get_attachment_url($att_ID)); ?>" alt="Images" />
									<div class="overlay" style="background-color:<?php echo esc_html($work1_var['p_hover_overlay']);?>">
										<div class="hover-txt">
											<div class="table-cell">
												<p style="color:<?php echo esc_html($work1_var['p_hover_title1_clr']);?>;"><?php echo esc_html($work1_var['p_hover_title1']);?></p>
												<?php if(!empty($work1_var['work1_taxo_separator'])) { ?>
													<hr class="h-border" style="border-top: 2px solid <?php echo esc_html($work1_var['work1_taxo_separator_clr']);?>;"/>
													<?php } ?>
												
												<h5 style="color:<?php echo esc_html($work1_var['p_hover_title2_clr']);?>;"><?php echo esc_html($work1_var['p_hover_title2']);?></h5>
												<div class="search">
													<a style="color:<?php echo esc_html($work1_var['p_hover_icon_clr']);?>" href="<?php echo esc_url(wp_get_attachment_url($att_ID)); ?>" data-rel="lightcase:myCollection:slideshow" class="lightcase" title="Zoom Image">
														<i class="<?php echo esc_attr($work1_var['p_hover_icon']);?>" aria-hidden="true"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- /.prothoma-item -->
					<?php endwhile; endif;?>
					
				</div> <!-- /.prothoma-container -->
			</div><!-- /.container -->
		</div><!-- /.Masonry -->
	</div><!-- /#Masonry -->
	
	
	<!-- Masonry End -->
	<?php return ob_get_clean();
	}