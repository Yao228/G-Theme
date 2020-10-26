<?php get_header(); ?>

<section class="page-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <h1 class="page-title"><?php the_title(); ?></h1>
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

<?php 
    if ( have_posts() ) :
	while ( have_posts() ) : the_post(); ?>
 
		<?php the_content() ?>
	
	<?php endwhile;
 
else :
	echo '<p>Pas de contenu pour cette page</p>';
 
endif;
?>

<?php get_footer(); ?>
