<?php 

function consult_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
        <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? (!($args['has_children']=='depth-1') ? 'new-depth' : '') : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
	

                <div class="comment-author vcard">
                        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
                </div>
    
		
		
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php echo esc_html__( 'Your comment is awaiting moderation.', 'text-domain' ); ?></em>
          <br />
    <?php endif; ?>        
     
	 
                
                <?php printf( __( '<cite class="fn">%s</cite>', 'text-domain'  ), get_comment_author_link() ); ?>

                <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">


<?php comment_text(); ?>	

                       
                                <?php
                                /* translators: 1: date, 2: time */
                                printf( __('%1$s at %2$s', 'text-domain' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'text-domain'  ), '  ', '' );
                                ?>
                       
                        
                </div>  	


        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div>		
      
	  
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
    }