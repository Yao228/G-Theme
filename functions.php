<?php 
function gavicole_theme_stup(){
    
    // Ajout la prise en charge du format de la publication
    add_theme_support( 'post-formats', array( 'image','video','gallery','audio', 'aside') );
    //Ajout de la personnalisation de l'entête
    add_theme_support( 'custom-header' ); 
    remove_filter ('the_content', 'wpautop');
    // Ajout de la personnalisation de l'arrière plan
    add_theme_support( 'custom-background' );
    // Ajout la prise en charge des images mises en avant
    add_theme_support( 'post-thumbnails' );

    // Ajout automatiquement le titre du site dans l'en-tête du site
    add_theme_support( 'title-tag' );
    
    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

}
add_action( 'after_setup_theme', 'gavicole_theme_stup' );

// Ajout le menu de navigation
function gavicole_nav_menu() {
    register_nav_menu('primary',__( 'Header Menu' ));
  }
 add_action( 'init', 'gavicole_nav_menu' );

 function gavicole_theme_scripts_styles() {
    $protocol = is_ssl() ? 'https' : 'http';
    //Style
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/dependencies/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/dependencies/fontawesome/css/all.min.css');
    wp_enqueue_style( 'animate', get_template_directory_uri().'/dependencies/wow/css/animate.css');
    wp_enqueue_style( 'swiper', get_template_directory_uri().'/dependencies/swiper/css/swiper.min.css');
    wp_enqueue_style( 'flaticon', get_template_directory_uri().'/dependencies/swiper/css/swiper.min.css');
    wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/dependencies/magnific-popup/css/magnific-popup.css');
    wp_enqueue_style( 'elegant-icons', get_template_directory_uri().'/dependencies/components-elegant-icons/css/elegant-icons.min.css');
    wp_enqueue_style( 'simple-line-icons', get_template_directory_uri().'/dependencies/simple-line-icons/css/simple-line-icons.css');
    wp_enqueue_style( 'app', get_template_directory_uri().'/assets/css/app.css');
    wp_enqueue_style("style", get_stylesheet_uri(), NULL, microtime());
    //Javascript
    wp_enqueue_script("jquery", get_template_directory_uri()."/dependencies/jquery/jquery.min.js",array(),false,true);
    wp_enqueue_script("bootstrap", get_template_directory_uri()."/dependencies/bootstrap/js/bootstrap.min.js",array(),false,true);
    wp_enqueue_script("swiper", get_template_directory_uri()."/dependencies/swiper/js/swiper.min.js",array(),false,true);
    wp_enqueue_script("jquery.appear", get_template_directory_uri()."/dependencies/jquery.appear/jquery.appear.js",array(),false,true);
    wp_enqueue_script("wow", get_template_directory_uri()."/dependencies/wow/js/wow.min.js",array(),false,true);
    wp_enqueue_script("countUp", get_template_directory_uri()."/dependencies/countUp.js/countUp.min.js",array(),false,true);
    wp_enqueue_script("isotope.pkgd", get_template_directory_uri()."/dependencies/isotope-layout/isotope.pkgd.min.js",array(),false,true);
     wp_enqueue_script("imagesloaded.pkgd", get_template_directory_uri()."/dependencies/imagesloaded/imagesloaded.pkgd.min.js",array(),false,true);
    wp_enqueue_script("jquery.parallax-scroll", get_template_directory_uri()."/dependencies/jquery.parallax-scroll/js/jquery.parallax-scroll.js",array(),false,true);
    wp_enqueue_script("jquery.magnific-popup", get_template_directory_uri()."/dependencies/magnific-popup/js/jquery.magnific-popup.min.js",array(),false,true);
    wp_enqueue_script("header", get_template_directory_uri()."/assets/js/header.js",array(),false,true);
    wp_enqueue_script("app", get_template_directory_uri()."/assets/js/app.js",array(),false,true);

}  
add_action( 'wp_enqueue_scripts', 'gavicole_theme_scripts_styles' );

function gavicole_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'gavicole_custom_logo_setup' );

   /* Add custom classes to list item "li" */

/*function _namespace_menu_item_class( $classes, $item ) {       
    $classes[] = "nav-item"; // you can add multiple classes here
    return $classes;
} 

add_filter( 'nav_menu_css_class' , '_namespace_menu_item_class' , 10, 2 );*/

/*function add_class_to_all_menu_anchors( $class ) {
    
    $class['class'] = 'nav-link';
 
    return $class;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10 );*/

function add_class_to_href( $classes, $item ) {
    if ( in_array('current_page_item', $item->classes) ) {
        $classes['class'] = 'current_page';
    }
    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_href', 10, 2 );

function change_logo_class( $html ) {

    $html = str_replace( 'custom-logo-link', 'navbar-brand', $html );

    return $html;
}
add_filter( 'get_custom_logo', 'change_logo_class' );

// Ajout de widgets au footer
function gavicole_theme_widgets_init() {
 
    // Footer widget du premier pied de page, située dans le pied de page. Vide par défaut.
    register_sidebar( array(
        'name' => __( 'Footer widget 1'),
        'id' => 'first-footer-widget-area',
        'description' => __( 'La première Footer widget de pied de page'),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Footer widget du deuxième pied de page, située dans le pied de page. Vide par défaut.
    register_sidebar( array(
        'name' => __( 'Footer widget 2'),
        'id' => 'second-footer-widget-area',
        'description' => __( 'La Footer widget du deuxième pied de page'),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Zone du widget du troisième pied de page, située dans le pied de page. Vide par défaut.
    register_sidebar( array(
        'name' => __( 'Footer widget 3'),
        'id' => 'third-footer-widget-area',
        'description' => __( 'La zone du widget du troisième pied de page'),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
 
    // Zone du widget du quatrième pied de page, située dans le pied de page. Vide par défaut.
    register_sidebar( array(
        'name' => __( 'Footer widget 4'),
        'id' => 'fourth-footer-widget-area',
        'description' => __( 'La Footer widget quatrième pied de page'),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    

    // Sidebar article singulier

    register_sidebar(array(
        'name' => __( 'Zone Article Sidebar' ),
        'id' => 'post-sidebar',
        'description' => __( 'Sidebar page article' ),
        'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
         
}
 
// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'gavicole_theme_widgets_init' );
/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class ParamtreThme {
    private $paramtre_thme_options;

    public function __construct() {
        add_action( 'admin_menu', array( $this, 'paramtre_thme_add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'paramtre_thme_page_init' ) );
    }

    public function paramtre_thme_add_plugin_page() {
        add_theme_page(
            'Paramètre thème', // page_title
            'Paramètre thème', // menu_title
            'manage_options', // capability
            'paramtre-thme', // menu_slug
            array( $this, 'paramtre_thme_create_admin_page' ) // function
        );
    }

    public function paramtre_thme_create_admin_page() {
        $this->paramtre_thme_options = get_option( 'paramtre_thme_option_name' ); ?>

        <div class="wrap">
            <h2>Paramètre thème</h2>
            <p></p>
            <?php settings_errors(); ?>

            <form method="post" action="options.php">
                <?php
                    settings_fields( 'paramtre_thme_option_group' );
                    do_settings_sections( 'paramtre-thme-admin' );
                    submit_button();
                ?>
            </form>
        </div>
    <?php }

    public function paramtre_thme_page_init() {
        register_setting(
            'paramtre_thme_option_group', // option_group
            'paramtre_thme_option_name', // option_name
            array( $this, 'paramtre_thme_sanitize' ) // sanitize_callback
        );

        add_settings_section(
            'paramtre_thme_setting_section', // id
            'Settings', // title
            array( $this, 'paramtre_thme_section_info' ), // callback
            'paramtre-thme-admin' // page
        );

        add_settings_field(
            'adresse_0', // id
            'Adresse', // title
            array( $this, 'adresse_0_callback' ), // callback
            'paramtre-thme-admin', // page
            'paramtre_thme_setting_section' // section
        );

        add_settings_field(
            'tlphone_1', // id
            'Téléphone', // title
            array( $this, 'tlphone_1_callback' ), // callback
            'paramtre-thme-admin', // page
            'paramtre_thme_setting_section' // section
        );

        add_settings_field(
            'e_mail_2', // id
            'E-mail', // title
            array( $this, 'e_mail_2_callback' ), // callback
            'paramtre-thme-admin', // page
            'paramtre_thme_setting_section' // section
        );

        add_settings_field(
            'copyright_3', // id
            'Copyright', // title
            array( $this, 'copyright_3_callback' ), // callback
            'paramtre-thme-admin', // page
            'paramtre_thme_setting_section' // section
        );

        add_settings_field(
            'facebook_4', // id
            'Facebook', // title
            array( $this, 'facebook_4_callback' ), // callback
            'paramtre-thme-admin', // page
            'paramtre_thme_setting_section' // section
        );

        add_settings_field(
            'twitter_5', // id
            'Twitter', // title
            array( $this, 'twitter_5_callback' ), // callback
            'paramtre-thme-admin', // page
            'paramtre_thme_setting_section' // section
        );

        add_settings_field(
            'linkedin_6', // id
            'Linkedin', // title
            array( $this, 'linkedin_6_callback' ), // callback
            'paramtre-thme-admin', // page
            'paramtre_thme_setting_section' // section
        );

        add_settings_field(
            'a_propos_7', // id
            'A propos', // title
            array( $this, 'a_propos_7_callback' ), // callback
            'paramtre-thme-admin', // page
            'paramtre_thme_setting_section' // section
        );
    }

    public function paramtre_thme_sanitize($input) {
        $sanitary_values = array();
        if ( isset( $input['adresse_0'] ) ) {
            $sanitary_values['adresse_0'] = sanitize_text_field( $input['adresse_0'] );
        }

        if ( isset( $input['tlphone_1'] ) ) {
            $sanitary_values['tlphone_1'] = sanitize_text_field( $input['tlphone_1'] );
        }

        if ( isset( $input['e_mail_2'] ) ) {
            $sanitary_values['e_mail_2'] = sanitize_text_field( $input['e_mail_2'] );
        }

        if ( isset( $input['copyright_3'] ) ) {
            $sanitary_values['copyright_3'] = sanitize_text_field( $input['copyright_3'] );
        }

        if ( isset( $input['facebook_4'] ) ) {
            $sanitary_values['facebook_4'] = sanitize_text_field( $input['facebook_4'] );
        }

        if ( isset( $input['twitter_5'] ) ) {
            $sanitary_values['twitter_5'] = sanitize_text_field( $input['twitter_5'] );
        }

        if ( isset( $input['linkedin_6'] ) ) {
            $sanitary_values['linkedin_6'] = sanitize_text_field( $input['linkedin_6'] );
        }

        if ( isset( $input['a_propos_7'] ) ) {
            $sanitary_values['a_propos_7'] = esc_textarea( $input['a_propos_7'] );
        }

        return $sanitary_values;
    }

    public function paramtre_thme_section_info() {
        
    }

    public function adresse_0_callback() {
        printf(
            '<input class="regular-text" type="text" name="paramtre_thme_option_name[adresse_0]" id="adresse_0" value="%s">',
            isset( $this->paramtre_thme_options['adresse_0'] ) ? esc_attr( $this->paramtre_thme_options['adresse_0']) : ''
        );
    }

    public function tlphone_1_callback() {
        printf(
            '<input class="regular-text" type="text" name="paramtre_thme_option_name[tlphone_1]" id="tlphone_1" value="%s">',
            isset( $this->paramtre_thme_options['tlphone_1'] ) ? esc_attr( $this->paramtre_thme_options['tlphone_1']) : ''
        );
    }

    public function e_mail_2_callback() {
        printf(
            '<input class="regular-text" type="text" name="paramtre_thme_option_name[e_mail_2]" id="e_mail_2" value="%s">',
            isset( $this->paramtre_thme_options['e_mail_2'] ) ? esc_attr( $this->paramtre_thme_options['e_mail_2']) : ''
        );
    }

    public function copyright_3_callback() {
        printf(
            '<input class="regular-text" type="text" name="paramtre_thme_option_name[copyright_3]" id="copyright_3" value="%s">',
            isset( $this->paramtre_thme_options['copyright_3'] ) ? esc_attr( $this->paramtre_thme_options['copyright_3']) : ''
        );
    }

    public function facebook_4_callback() {
        printf(
            '<input class="regular-text" type="text" name="paramtre_thme_option_name[facebook_4]" id="facebook_4" value="%s">',
            isset( $this->paramtre_thme_options['facebook_4'] ) ? esc_attr( $this->paramtre_thme_options['facebook_4']) : ''
        );
    }

    public function twitter_5_callback() {
        printf(
            '<input class="regular-text" type="text" name="paramtre_thme_option_name[twitter_5]" id="twitter_5" value="%s">',
            isset( $this->paramtre_thme_options['twitter_5'] ) ? esc_attr( $this->paramtre_thme_options['twitter_5']) : ''
        );
    }

    public function linkedin_6_callback() {
        printf(
            '<input class="regular-text" type="text" name="paramtre_thme_option_name[linkedin_6]" id="linkedin_6" value="%s">',
            isset( $this->paramtre_thme_options['linkedin_6'] ) ? esc_attr( $this->paramtre_thme_options['linkedin_6']) : ''
        );
    }

    public function a_propos_7_callback() {
        printf(
            '<textarea class="large-text" rows="5" name="paramtre_thme_option_name[a_propos_7]" id="a_propos_7">%s</textarea>',
            isset( $this->paramtre_thme_options['a_propos_7'] ) ? esc_attr( $this->paramtre_thme_options['a_propos_7']) : ''
        );
    }

}
if ( is_admin() )
    $paramtre_thme = new ParamtreThme();

/* 
 * Retrieve this value with:
 * $paramtre_thme_options = get_option( 'paramtre_thme_option_name' ); // Array of All Options
 * $adresse_0 = $paramtre_thme_options['adresse_0']; // Adresse
 * $tlphone_1 = $paramtre_thme_options['tlphone_1']; // Téléphone
 * $e_mail_2 = $paramtre_thme_options['e_mail_2']; // E-mail
 * $copyright_3 = $paramtre_thme_options['copyright_3']; // Copyright
 * $facebook_4 = $paramtre_thme_options['facebook_4']; // Facebook
 * $twitter_5 = $paramtre_thme_options['twitter_5']; // Twitter
 * $linkedin_6 = $paramtre_thme_options['linkedin_6']; // Linkedin
 * $a_propos_7 = $paramtre_thme_options['a_propos_7']; // A propos
 */
// Générer le  breadcrumbs
 
function get_breadcrumb() {
    echo '<li class="breadcrumb-item"><a href="'.home_url().'" rel="nofollow">Accueil</a></li>';
    if (is_category() || is_single()) {
      /*  the_category(); */
         /*echo '<li class="breadcrumb-item">'.the_category().'</li>';*/
            if (is_single()) {
                the_title('<li class="breadcrumb-item active" aria-current="page">', '</li>');
            }
    } elseif (is_page()) {
        echo the_title('<li class="breadcrumb-item active" aria-current="page">', '</li>');
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

// Ajout de la pagination à la liste de blog
function gavicole_blog_pagination($pages = '', $range = 2) 
{  
    $showitems = ($range * 2) + 1;  
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query; 
        $pages = $wp_query->max_num_pages;
    
        if(!$pages)
            $pages = 1;      
    }   
    
    if(1 != $pages)
    {
        echo '<nav aria-label="Page navigation" role="navigation">';
        echo '<span class="sr-only">Page navigation</span>';
        echo '<ul class="pagination justify-content-center ft-wpbs">';
        
        echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Page '.$paged.' sur '.$pages.'</span></li>';
    
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block"> First</span></a></li>';
    
        if($paged > 1 && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block"> Previous</span></a></li>';
    
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
        }
        
        if ($paged < $pages && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Next </span>&rsaquo;</a></li>';  
    
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Last </span>&raquo;</a></li>';
    
        echo '</ul>';
        echo '</div>';
        //echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>';     
    }
}

// Customisation du widget de recherche
 function gavicole_theme_search_form( $form ) {

     $form ='<div id="search" class="widget widget_search">
        <form method="get" action="'.esc_url(home_url('/')).'" role="search" class="search-form-widget">
            <label>
            <input type="text" name="s" class="search-field" placeholder="'.esc_attr__('Recherche...').'" value="'.get_search_query().'">
            </label>
            <button type="submit" class="search-submit"><i class="ei ei-icon_search"></i></button>
        </form>
    </div>';

    return $form;
}
add_filter( 'get_search_form', 'gavicole_theme_search_form' );

function gavicole_theme_recent_posts(){ 
        echo '<div class="widget footer-widget">';
        echo '<h3 class="widget-title">Articles récents</h3>';
        echo '<div class="gp-posts-widget-wrapper">';
        $recent_posts = wp_get_recent_posts(array(
			'numberposts' => 3, // Number of recent posts thumbnails to display
			'post_status' => 'publish' // Show only the published posts
    		));
            foreach($recent_posts as $post){ ?>
            <div class="post-item">
                <div class="post-widget-thumbnail">
                    <a href="<?php echo get_permalink($post["ID"]); ?>">
                        <?php echo get_the_post_thumbnail($post["ID"], array(80, 80)); ?>
                    </a>
                </div>
                <div class="post-widget-info">
                    <h5 class="post-widget-title">
                        <a href="<?php echo get_permalink($post["ID"]); ?>" title="This Is Test Post">
                        <?php echo esc_html($post["post_title"]); ?>
                        </a>
                    </h5>
                    <span class="post-date"><?php the_time('j F Y'); ?></span>
                </div>
        </div>
         <?php }
         echo '</div>';
        echo '</div>';
}
add_filter( 'widget_posts_args', 'gavicole_theme_recent_posts' );


function gavicole_submenu_class($menu) {    
    $menu = preg_replace('/ class="sub-menu"/','/ class="dropdown-menu" /',$menu);        
    return $menu;      
}

add_filter('wp_nav_menu','gavicole_submenu_class'); 
 