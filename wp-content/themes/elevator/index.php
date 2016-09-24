<?php get_header(); ?>

<main>   
    <section id="content" class="posts"> 

    <?php while (have_posts()) : the_post();
    get_template_part( 'content', get_post_format() ); 
    endwhile; 
    ?>
 
    </section>

    <?php if (wp_is_mobile()){ ?>
    <section class="right-sidebar">   
    <aside >
    <?php 
    dynamic_sidebar('Sidebar Mobile');
    //include(TEMPLATEPATH."/sidebar.php");?> 
    </aside>
    </section>  
    <?php }?>

    <div id="content-ad">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- ELEVATOR Medium Rectangle -->
        <ins class="adsbygoogle"
        style="display:inline-block;width:300px;height:250px"
        data-ad-client="ca-pub-2563303403517648"
        data-ad-slot="7039249419"></ins>
        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    </div>  


</main>

<?php get_footer(); ?>