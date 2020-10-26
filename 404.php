<?php
 
get_header();
 ?>
 <section class="error-page">
    <div class="container">
        <div class="error-content-wrapper text-center">
            <div class="error-content">
                <img src="<?php echo get_stylesheet_directory_uri().'/media/background/error.png'; ?>" alt="error">
                <h2 class="error-title"><?php echo esc_html__( 'Page non trouvée', 'gavicole' ); ?></h2>
                
                <p><?php echo esc_html__( 'Nous n\'avons pas trouvé la page que vous recherchez.', 'gavicole' ); ?></p>
                <a href="<?php echo home_url(); ?>" class="pix-btn"><?php echo esc_html__( 'Aller à l\'accueil', 'gavicole' ); ?></a>
            </div>
        </div>
    </div>
</section>

<?php
 
get_footer();
 
?>