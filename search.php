<?php get_header(); ?>

 <!-- Start Page Title Area -->
 <section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title">
            <?php echo $wp_query->found_posts; ?>
        <?php _e( 'résultats trouvés pour', 'locale' ); ?>: "<?php the_search_query(); ?>
            </h1>
            <ul class="bradcurmed">
               <?php get_breadcrumb(); ?>
            </ul>
        </div>
    </div>
    <svg class="circle" data-parallax="{&quot;x&quot; : -200}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="950px" height="950px" style="transform:translate3d(-200px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(-200px, 0px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); "><path fill-rule="evenodd" stroke="rgb(250, 112, 112)" stroke-width="100px" stroke-linecap="butt" stroke-linejoin="miter" opacity="0.051" fill="none" d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z"></path>
    </svg>
    <ul class="animate-ball">
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li><li class="ball"></li>
        <li class="ball"></li>
    </ul>
</section>

  <!-- Start Blog Section -->
 <section class="blog-section ptb-100 mt-5">
    <div class="container">
        <div class="row">
        <?php if ( have_posts() ) { ?>


        <?php while ( have_posts() ) { the_post(); ?>

            <div class="col-lg-4 col-md-6">
                <article class="post-post-grid">
                    <div class="feature-image">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo substr(get_the_title(), 0, 70) ?>">
                        </a>
                    </div>
                    <div class="blog-content">
                        <ul class="post-meta">
                            <li>
                                <a href="#"><?php the_time('j F Y') ?></a>
                            </li>
                        </ul>
                        <h3 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                            <?php echo substr(get_the_title(), 0, 70) ?>
                            </a>
                        </h3>
                        <div class="author">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
                            <a href="#" class="author-link"><?php the_author(); ?></a>
                        </div>
                    </div>
                 </article>
            </div>

            <?php } ?>
        <?php } ?>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <?php 
                     if (function_exists("gavicole_blog_pagination"))
                     {
                         gavicole_blog_pagination($blogposts->max_num_pages);
                     }
                ?> 
            </div>
        </div>
    </div>
</section>
<!-- End Blog Section -->


<?php get_footer(); ?>