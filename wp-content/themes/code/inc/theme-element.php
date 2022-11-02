<?php

function consult_section_1($attr){
	

	
	
	extract(
	shortcode_atts(array(
		'title_sec_1' => 'Eta ekta value',
		'title_sec_desc_1' => 'Eta ekta Description',
		'title_sec_desc_1_color' => '',
		'title_sec_1_image' => '',
	
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	
	    <div class="looking_for_specific_area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="looking_for_left para_default">
                        <h3><?php echo esc_html($title_sec_1);?></h3>
                        <p style="color:<?php echo esc_html($title_sec_desc_1_color);?>"><?php echo esc_html($title_sec_desc_1);?> </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="looking_for_right image_fulwidth wow fadeInRight" data-wow-delay="300ms">

						
						<?php
						$sce1_image =wp_get_attachment_image_src($title_sec_1_image,'full');
						
						if($sce1_image){?>
							
						
							 <img src="<?php echo esc_url($sce1_image[0]);?>">
							
						<?php }
						
						?>
						
						
						
                    </div>
					
                </div>
            </div><!--row -->
        </div><!--container -->
    </div><!--looking_for_specific_area -->
	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_1_base','consult_section_1');



//section 3



function consult_section_3($attr){
	

	
	
	extract(
	shortcode_atts(array(

	'sec_3_grp'=>'',
	'sec_3_icon'=>'',
	'sec_3_title'=>'',
	'sec_3_desc'=>'',
	'sec_3_image'=>'',
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	
	    <div class="about_section_area">
        <div class="container-fluid">
            <div class="row">
       <?php 

           $sec_3_key =vc_param_group_parse_atts($sec_3_grp);
		   
		   foreach($sec_3_key as $sec_3_value){?>
			   
			     <div class="col-md-4 col-sm-6">
                    <div class="about_Single_item para_default text-center wow fadeInLeft" data-wow-delay="300ms">  
					
											
						<?php
						$sce3_image =wp_get_attachment_image_src($sec_3_value['sec_3_image'],'full');
						
						if($sce3_image){?>
							
						
							 <img src="<?php echo esc_url($sce3_image[0]);?>">
							
						<?php }
						
						?>
					
					
                        <i class="<?php echo esc_attr($sec_3_value['sec_3_icon']);?>"></i>
                        <h3><?php echo esc_html($sec_3_value['sec_3_title']);?></h3>
                        <p><?php echo esc_html($sec_3_value['sec_3_desc']);?></p>
                    </div>
                </div><!--col-md-4 -->
			   
			   
		 <?php  }
		 
		 	   ?>



			

				
				

            </div><!--row -->
        </div><!--container-fluid -->
    </div><!--about_section_area -->

	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_3_base','consult_section_3');




//



function consult_section_cf($attr,$content=null){
	

	
	
	extract(
	shortcode_atts(array(
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	<div class="contact_page_get_start_area">
        <div class="container">
            <div class="row">
                <div class="make_an_appoinment_area get_start_areA">
                    <div class="col-md-12">
                        <h3 class="title_get_start text-center">Ready to Get Started?</h3>
                    </div>
					
					<?php 
					
					include_once( ABSPATH .'wp-admin/includes/plugin.php');
					
					if(is_plugin_active('contact-form-7/wp-contact-form-7.php')){
						
						echo do_shortcode($content);
					}

					?>
					
					
					
					

					
					
                </div>
            </div><!--row-->
        </div><!--container-->
    </div><!--contact_page_get_start_area-->
	
	
	
	
		<?php
	return ob_get_clean();
	
}
add_shortcode('section_cf','consult_section_cf');





//Blog

function consult_section_blog($attr,$content=null){
	

	
	
	extract(
	shortcode_atts(array(
      'sec_blog_title'=>'',
	
	),$attr)
	);
	
	
	ob_start();
	
	?>
	
	    <div class="latest_blog_section_area removeBg_latest_blog">
        <div class="container">
		
            <div class="row">
			
				<div class="item single_blog_item_div para_default text-center">
					<h2><a><?php echo esc_html($sec_blog_title);?></a></h2>
				</div>
				
				<?php 
                      $consult_blog_post  =new WP_Query(array(
					  'post_type'=>'post',
					
					  'post_per_page'=>3,
					  
					  ));
					  
                     if($consult_blog_post->have_posts()):while($consult_blog_post->have_posts()):$consult_blog_post->the_post();	
					
						 
  

				?>
				
                <div class="col-md-4">
                    <div class="single_blog_h_active">
                        <div class="single_blog_item_area para_default image_fulwidth text-center">
                            <a href="#"><?php the_post_thumbnail();?></a>
                            <h4><?php echo get_the_date('F j Y');?></h4>
                            <h3><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_content(),15); ?></p>
                        </div>
					</div>
				</div>
				
				<?php endwhile; endif; ?>
				
            </div>
        </div><!-- container-->
    </div><!-- latest_blog_section_area-->
	
	
	
	
	<?php
	return ob_get_clean();
	
}
add_shortcode('section_3_blog','consult_section_blog');


?>