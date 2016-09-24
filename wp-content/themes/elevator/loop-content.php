<article id="post-<?php the_ID(); ?>">

        <?php $t = get_field( "submission_type" ); ?>
            <?php if ($t == "None") { ?>
            <?php } else { ?>
            <div class="poststatus" style="margin-top:-20px;">
            <a href="<?php echo get_option('home'); ?>/submissions" style="color:#fff;">
            <?php the_field('submission_party'); ?>  <?php //the_field('submission_type'); ?>
            <?php $ts = get_field( "submission_type" ); ?>
            <?php if ($ts == "Promoted") { ?>
            <?php the_field('submission_type'); ?> <i class="fa fa-star"></i>
            <?php } else { ?>
            <?php the_field('submission_type'); ?>
            <?php }?>
            </a>
            </div>
        <?php }?>

        <a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'home-thumbnail-one' ); ?></a>   
        
        <div class="post-content">
            
            <div class="post-meta">  
            <div class="post-category">            
                <?php the_category(' ') ?>
            </div>
            <time>
                <span><?php the_time(__("M", 'organicthemes')) ?></span> 
                <span><?php the_time(__("j", 'organicthemes')) ?></span>,
                <span><?php the_time(__("Y", 'organicthemes')) ?></span>
            </time>
            <div class="post-author">            
                <?php _e("| by", 'organicthemes'); ?> <?php the_author_posts_link(); ?>
            </div> 
            </div>
            
            <div class="titlebox">
                <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            </div>

        </div>  
                           
    </article>