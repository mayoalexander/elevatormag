<article id="post-<?php the_ID(); ?>" class="search-result">

            <h1 class="search-result-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h1>

            <a href="<?php echo get_permalink(); ?>" class="search-result-link"><?php echo get_permalink(); ?></a>
            
            <div class="search-result-excerpt"><?php the_excerpt(); ?></div>                 
                    
</article>