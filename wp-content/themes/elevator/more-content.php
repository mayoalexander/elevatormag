<?php 

	display_ad(content); 

	

	while (have_posts()) : the_post();

	if ( is_search()){
    get_template_part( 'loop', 'search' ); 

	}else {
    get_template_part( 'content', get_post_format() ); 

	}

    endwhile;
	

?>
