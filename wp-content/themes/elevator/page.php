<?php get_header(); ?>
<?php display_ad(top); ?>

<?php if( is_page(2040)){
    define('DONOTCACHEPAGE', TRUE);
}
?>

<main>
    <section>
    <?php display_ad(mid); ?>

    <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
    
    <article>
    
            <div class="titlebox">
                <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            </div>    
                           
            <div class="content">
                <?php the_content(); ?>       
            </div>

    </article>

    <?php endwhile; ?>
    <?php else : // do not delete ?>
    <?php endif; // do not delete ?>
        
    </section>

    <aside class="sidebar">

    <div class="connect">
        <h2>Connect</h2>

        <div class="connect-icons">
        <a href="https://www.facebook.com/ElevatorMag/" target="_blank">
            <i class="fa fa-facebook"></i>
        </a>
        <a href="https://twitter.com/elevator_" target="_blank">
            <i class="fa fa-twitter"></i>
        </a>
        <a href="https://soundcloud.com/lvtrmag" target="_blank">
            <i class="fa fa-soundcloud"></i>
        </a>
        <a href="https://www.instagram.com/elevator_/" target="_blank">
            <i class="fa fa-instagram"></i>
        </a>
        <a href="https://www.youtube.com/user/LVTRmag" target="_blank">
            <i class="fa fa-youtube-play"></i>
        </a>
        </div>
    </div>



    <?php 

    if (wp_is_mobile()){
        display_ad(halfpage);

    }
    else{
        display_ad(content);
    }
    ?>

    <div class="popular-posts">
    <h2>Popular</h2>
    <?php wpp_get_mostpopular('range=weekly&order_by=views&post_type=post&freshness=1&thumbnail_width=300&thumbnail_height=175&stats_views=0&limit=5&post_html="<li><div>{thumb}</div>{title}{stats}</li>"'); ?>
    </div>
    
    </aside>

    <?php display_ad(bottom); ?>
    
</main>

<?php get_footer(); ?>