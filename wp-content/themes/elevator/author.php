<?php get_header(); ?>
<?php display_ad(top); ?>

<main>
    <section class="author-profile-container">
        
            <?php
            if(isset($_GET['author_name'])) :
            $curauth = get_userdatabylogin($author_name);
            else :
            $curauth = get_userdata(intval($author));
            endif;    
            ?>

            <div class="author-avatar"> 
            <?php if(function_exists('get_avatar')) { echo get_avatar($author, '300'); } ?>
            </div>

            <div class="author-profile">
            <h1><?php echo $curauth->display_name; ?></h1>
            <h2><?php display_author_role(); //echo implode(', ', $curauth->roles) . "\n" ?></h2>         

            <p><a href="<?php echo $curauth->user_url; ?>" rel="bookmark" target="_blank"><i class="fa fa-twitter fa-2x"></i></a></p>
            <div class="author-bio">
            <p><?php echo $curauth->user_description; ?></p>
            </div>
        </div>

    </section>

    <?php display_ad(mid); ?>

<section id="content" class="posts"> 

    <h3><?php _e("Posts by", 'organicthemes'); ?> <?php echo $curauth->display_name; ?></h3>    

    <?php while (have_posts()) : the_post(); ?>
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
        
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>  
 
    </section>

    <?php display_ad(bottom); ?>
    
</main>

<?php get_footer(); ?>
<?php get_footer(); ?>