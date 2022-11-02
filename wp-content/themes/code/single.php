<?php get_header();?>
    <div class="page_title_banner banner_blog_single_title_bg">
        <div class="page_title_banner_overlay"></div>
        <div class="container">
            <div class="page_title_banner_text text-center">
                <h2 class="banner_effect">Blog single</h2>
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pages</a></li>
                    <li class="active">blog single</li>
                </ul>
            </div>
        </div><!--container-->
    </div><!-- page_title_banner -->

    <div class="blog_page_area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
									
					<?php 
                      if(have_posts()):
					  while(have_posts()):the_post();
					  
					  ?>
				       <div class="blog_left_side_area">
                        <div class="blog_pic image_fulwidth">
                            <?php the_post_thumbnail();?>
                            <h4 class="date_position"><?php echo get_the_date('F j Y');?></h4>
                        </div>
				<div class="blog_left_single_content blog_single_content para_default">
					<h3><?php echo get_the_title();?></h3>
					<p><?php the_content(); ?></p>

				</div>

                        <div class="blog_tag">
                            <?php the_tags( ' ', ' ', '<br />' ); ?>
                        </div>

                        <div class="share_blog_single_in_social">
                            <h4>
								<span>Share</span>						
								<a href="http://www.facebook.com/sharer.php?url=<?php the_permalink();?>&amp;t=<?php the_title(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="fa fa-google-plus"></i></a>
								<a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							</h4>
                        </div>
						
						
						<div class="content_blog_a fix">
							<div class="e_blog_A">
								 <?php echo get_avatar(get_the_author_meta('ID'),100); ?>
 
							</div>
							<div class="blog_a_text">
							
								<h5><a href="<?php echo get_author_posts_url(get_the_author_meta('ID'),get_the_author_meta('user_nicename'));?>" class="admin"><?php the_author();?></a></h5>
								
								<p><?php the_author_meta('description'); ?></p>
							</div>
						</div>
						
						<?php  

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
			
                        <div class="consultency_comments_form">
                            <h2 class="comments_title">Leave a Reply</h2>
                            <div class="row">
                                <form action="#" method="post">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="E-mail*">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="url" class="form-control" placeholder="Website">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" rows="4" placeholder="Your Comment"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="send_me_ph">
                                                <a class="submit_btn_quick_contact" href="#">Submit Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
						
						
						
                    </div><!-- blog_left_side_area -->
				
				    <?php
                    endwhile;
					endif;
					wp_reset_postdata();
					?>

                </div><!-- col-md-8 -->

                <div class="col-md-4">
                    <div class="blog_right_side_area">
                        <div class="blog_right_widget">
                            <div class="blog_widget">
                                <form action="#" method="post" class="blog_search">
                                    <input type="text" placeholder="Search...">
                                    <div class="blog_search_btn"> <input type="submit" value=""></div>
                                </form>
                            </div>
                        </div><!-- blog_right_widget  -->
                        
                        <div class="blog_right_widget">
                            <div class="blog_widget">
                                <h3 class="blog_widget_title">Categories</h3>
                                <ul>
                                    <li><a href="service-details-page-01.html">Business Modules</a></li>
                                    <li><a href="service-details-page-02.html">Development</a></li>
                                    <li><a href="service-details-page-03.html">Consultancy Service</a></li>
                                    <li><a href="service-details-page-04.html">Marketing Strategy</a></li>
                                    <li><a href="service-details-page-05.html">Finance Management</a></li>
                                    <li><a href="service-details-page-06.html">Audit & Assurance</a></li>
                                    <li><a href="service-details-page-07.html">Taxation</a></li>
                                </ul>
                            </div>
                        </div><!-- blog_right_widget  -->


                        <div class="blog_right_widget">
                            <div class="blog_widget">
                                <h3 class="blog_widget_title">Project</h3>
                                <div class="project_div clearfix">
                                    <figure class="image">
                                        <a href="images/blog_project_item_01.jpg" data-fancybox="gallery">
                                            <img src="images/blog_project_item_01.jpg" alt="images">
                                        </a>
                                    </figure>

                                    <figure class="image">
                                        <a href="images/blog_project_item_02.jpg" data-fancybox="gallery">
                                            <img src="images/blog_project_item_02.jpg" alt="images">
                                        </a>
                                    </figure>

                                    <figure class="image">
                                        <a href="images/blog_project_item_03.jpg" data-fancybox="gallery">
                                            <img src="images/blog_project_item_03.jpg" alt="images">
                                        </a>
                                    </figure>

                                    <figure class="image">
                                        <a href="images/blog_project_item_04.jpg" data-fancybox="gallery">
                                            <img src="images/blog_project_item_04.jpg" alt="images">
                                        </a>
                                    </figure>

                                    <figure class="image">
                                        <a href="images/blog_project_item_05.jpg" data-fancybox="gallery">
                                            <img src="images/blog_project_item_05.jpg" alt="images">
                                        </a>
                                    </figure>

                                    <figure class="image">
                                        <a href="images/blog_project_item_06.jpg" data-fancybox="gallery">
                                            <img src="images/blog_project_item_06.jpg" alt="images">
                                        </a>
                                    </figure>
                                </div>
                            </div>
                        </div><!-- blog_right_widget  -->

                        <div class="blog_right_widget">
                            <div class="blog_widget">
                                <h3 class="blog_widget_title">Archive</h3>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <select>
                                            <option value="Select Month">
                                                Select Month
                                            </option>
                                            <option value="saab">
                                                January 2017
                                            </option>
                                            <option value="mercedes">
                                                february 2017
                                            </option>
                                            <option value="audi">
                                                March 2017
                                            </option>
                                            <option value="audi">
                                                April 2017
                                            </option>
                                            <option value="audi">
                                                August 2017
                                            </option>
                                            <option value="audi">
                                                Dcember 2017
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div><!-- blog_right_widget  -->
                    </div>
                </div><!-- col-md-4 -->
            </div><!-- row -->

            
        </div><!-- container -->
    </div><!-- blog_page_area -->

   <?php get_footer();?>