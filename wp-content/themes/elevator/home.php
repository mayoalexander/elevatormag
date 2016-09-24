<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>
<?php display_ad(top); ?>

<?php query_posts(array( 'post_type' => 'slider','showposts' => -1) );?>

<?php if (have_posts()) : ?>

<section class="billboard">
    <h1>FEATURED</h1>
    <article>

        <?php while (have_posts()) : the_post(); ?>

            <a href="<?php the_field('slider_link'); ?>" class="thumbnail">
            <?php the_post_thumbnail('home-feature');?>
            <?php if(get_field('short_description')){
            echo '<h1 class="caption">' . get_field('short_description') . '</h1>';
            }?>
            </a>

        <?php endwhile; ?>

    </article>
</section>
<?php else : ?>

<?php endif; ?>
<?php wp_reset_query(); ?>

<main>
    <?php display_ad(mid); ?>
    
    <section id="content" class="posts"> 

    <?php while (have_posts()) : the_post();
    get_template_part( 'loop' , 'content'); 
    endwhile; 
    ?>
    </section>

    <?php display_ad(bottom); ?>

</main>

<?php get_footer(); ?>