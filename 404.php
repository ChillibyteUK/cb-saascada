<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
?>
<main id="main" class="padding-top">
<?php
$bg = wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
?>    
<!-- hero -->
<section id="hero" class="hero d-flex" style="background-image:url(<?=$bg?>)">
    <div class="hero__inner container d-flex align-items-center py-5">
        <div class="my-auto w-100">
            <div class="row">
                <div class="col-lg-6 hero__content" data-aos="fade">
                    <h1>404 - Page Not Found</h1>
                    <div class="hero__content fs-4 mb-4">We can't seem to find the page you're looking for</div>
                    <a class="btn btn-primary" href="/">Return to Homepage</a>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay--bottom"></div>
</section>
</main>
<?php
get_footer();