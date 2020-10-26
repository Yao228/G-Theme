<?php

get_header();

while (have_posts()) {
        the_post();

?>
<section class="page-banner blog-details-banner">
    <div class="container">
        <div class="page-title-wrapper">
            <ul class="post-meta color-theme">
                <li>
                    <a href="#"><?php the_time('j F Y') ?></a>
                </li>
            </ul>
            <h1 class="page-title"><?php the_title(); ?></h1></h1>
            <ul class="post-meta">
                <li>
                    <span>Par</span> 
                    <a href="#"><?php the_author(); ?></a>
                </li>
                <li>
                    <a href="#"><?php echo get_comments_number(); ?> <?php echo esc_html__( 'commentaires', 'gavicole' ); ?></a>
                </li>
                <li>
                   <?php echo get_the_category_list(',') ?>
                </li>
            </ul>
        </div>
    </div>
    <svg class="circle" data-parallax="{&quot;x&quot; : -200}" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="950px" height="950px"><path fill-rule="evenodd" stroke="rgb(250, 112, 112)" stroke-width="100px" stroke-linecap="butt" stroke-linejoin="miter" opacity="0.051" fill="none" d="M450.000,50.000 C670.914,50.000 850.000,229.086 850.000,450.000 C850.000,670.914 670.914,850.000 450.000,850.000 C229.086,850.000 50.000,670.914 50.000,450.000 C50.000,229.086 229.086,50.000 450.000,50.000 Z"></path></svg>
    <ul class="animate-ball">
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
        <li class="ball"></li>
    </ul>
</section>
<section class="blog-single">
    <div class="container pb-120">
        <div class="row">
            <div class="col-md-8">
                <div class="post-wrapper">
                    <article class="post post-signle">
                        <div class="feature-image">
                            <a href="blog-signle.html">
                                 <img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>">
                            </a>
                        </div>
                        <div class="blog-content">
                             <?php the_content(); ?>
                        <div class="tagcloud">
                            <span>Tags:</span> 
                            <?php 
                                    $post_tags = get_the_tags();

                                    if ( $post_tags ) {
                                        foreach( $post_tags as $tag ) {
                                        echo '<a href="' . get_tag_link($tag->term_id) . '">'.$tag->name.'</a> ';
                                        }
                                    }

                                ?>
                            </div>
                        </div>
                    </article>
                    <!-- <div class="blog-share">
                        <div class="share-title">
                            <p>Partager:</p>
                        </div>
                        <ul class="share-link">
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->

                    <div class="pixsass_post_author_box clearfix">
                        <div class="profile_image">
                             <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                        </div>
                        <div class="profile_content">
                            <h4 class="profile_name"><?php the_author(); ?></h4>
                            <span class="author-job"><?php the_author_meta('aim');?></span>
                            <div class="profile_bio">
                                <?php the_author_meta('description');?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                     <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </div>
    <div class="comment-area section-bg">
        <div class="container">
            <div class="post-wrapper">
                <div id="comments" class="comments-area">
                    <h3 class="coment-title"><?php echo get_comments_number() ?> <?php echo esc_html__( 'commentaire(s)', 'gavicole' ); ?></h3>
                    <ul class="comment-list">
                    <?php
                        $comments_number = get_comments_number();
                        if($comments_number !=0){
                            
                            $args = get_comments(array(
                                'post_id' => 2,
                                'statu' => 'approve',
                                'per_page' => 6
                            ));

                            $comments_query = new WP_Comment_Query;
                            $comments = $comments_query->query($args);

                            if($comments){
                                foreach($comments as $comment){ ?>
                                    <li class="comment">
                                        <article class="comment-body">
                                            <div class="comment-author">
                                                <?php echo get_avatar( $comment, 70); ?>
                                            </div>
                                            <div class="comment-content">
                                                <h4 class="fn">
                                                    <a href="#"><?php echo $comment->comment_author; ?></a>
                                                </h4>
                                                <div class="comment-metadata">
                                                    <a href="#"><?php echo $comment->comment_date_gmt; ?></a>
                                                </div>
                                                <p><?php echo $comment->comment_content; ?></p>
                                                <a rel="nofollow" class="comment-reply-link" href="<?php comment_reply_link( array('reply_text' => 'Reply this comment'), comment_ID(), the_ID() );?>">
                                                    <i class="ei ei-arrow_back"></i><?php echo esc_html__( 'Répondre', 'gavicole' ); ?>
                                                </a>
                                            </div>
                                        </article>
                                    </li>
                                <?php } } ?>
                        
                         <?php } ?>
                    </ul> 
                    <div id="respond" class="comment-respond">
                     <?php comments_template();?> 
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

 
<?php get_footer();?>