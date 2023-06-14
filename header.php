<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package cb-saascada
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/raleway-v28-latin-300.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/raleway-v28-latin-600.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/raleway-v28-latin-800.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <?php
    if (get_field('ga_property', 'options')) { 
        ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?=get_field('ga_property','options')?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?=get_field('ga_property','options')?>');
</script>
        <?php
    }
    if (get_field('gtm_property', 'options')) {
        ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?=get_field('gtm_property','options')?>');</script>
<!-- End Google Tag Manager -->
        <?php
    }
    if (get_field('google_site_verification','options')) {
        echo '<meta name="google-site-verification" content="' . get_field('google_site_verification','options') . '" />';
    }
    if (get_field('bing_site_verification','options')) {
        echo '<meta name="msvalidate.01" content="' . get_field('bing_site_verification','options') . '" />';
    }
    ?>
	<?php
    
    wp_head();
    
    $socials = array();
    $social = get_field('social', 'options');
    if ($social['facebook_url']) {
        $socials[] = '"' . $social['facebook_url'] . '"';
    }
    if ($social['linkedin_url']) {
        $socials[] = '"' . $social['linkedin_url'] . '"';
    }
    if ($social['twitter_url']) {
        $socials[] = '"' . $social['twitter_url'] . '"';
    }
    if ($social['youtube_url']) {
        $socials[] = '"' . $social['youtube_url'] . '"';
    }
    $s = implode(',',$socials);

    ?>
	
	<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "SaaScada",
  "url": "https://www.saascada.com/",
  "description": "Cloud native core banking. Enabling organisations to rapidly build and launch financial products.",
  "sameAs": [
    <?=$s?>
  ]
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php
do_action('wp_body_open'); 
?>
<div id="wrapper-navbar" class="fixed-top">
    <!-- <a class="skip-link sr-only sr-only-focusable" href="#content">Skip to content</a> -->
    <nav id="nav" class="navbar navbar-expand-xl navbar-light" aria-labelledby="nav-label">
        <div class="container align-items-end" id="main-nav">
            <a href="/" class="navbar-brand logo-link logo" rel="home"></a>
            <button class="navbar-toggler input-button ml-auto collapsed d-xl-none" id="navToggle" data-bs-toggle="collapse" data-bs-target="#primaryNav" type="button" aria-expanded="false"><i class="fa fa-navicon" aria-hidden="true"></i></button>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'primary_nav',
                        'container_class' => 'collapse navbar-collapse',
                        'container_id'    => 'primaryNav',
                        'menu_class'      => 'navbar-nav w-100 justify-content-between align-content-center',
                        'fallback_cb'     => '',
                        'menu_id'         => 'main-menu',
                        'depth'           => 3,
                        'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                    )
                );
            ?>
        </div>
    </nav>
</div>