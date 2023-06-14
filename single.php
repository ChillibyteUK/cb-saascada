<?php
/**
 * The template for displaying all single posts
 *
 * @package cb-carousel
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

// $bg = get_the_post_thumbnail_url( get_the_ID(), 'full' ) ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
$bg = wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
?>
<main id="main">
<!-- hero -->
<section class="hero d-flex" style="background-image:url(<?=$bg?>)">
    <!-- <div class="overlay overlay--dark"></div> -->
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-8 py-5 d-flex align-items-center z-index-0">
                <div>
                    <div class="hero__meta text-white"><?=get_the_date('j F Y')?></div>
                    <h1 class="hero__title text-white"><?=get_the_title()?></h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="content pb-5">
        <?=apply_filters('the_content',get_the_content())?>
        <div class="clearfix"></div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="share-icons">Share: 
                <?php
                    $url = get_permalink();
                ?>
                <a target="_blank" href="mailto:?subject=I%27d%20like%20to%20share%20a%20link%20with%20you&body=<?=$url?>"><i class="fa-solid fa-envelope"></i></a>
                <a target="_blank" href="https://twitter.com/share?url=<?=$url?>"><i class="fa-brands fa-twitter"></i></a>
                <a target="_blank" href="http://www.facebook.com/sharer.php?u=<?=$url?>"><i class="fa-brands fa-facebook-f"></i></a>
                <a target="_blank" href="http://www.linkedin.com/shareArticle?url=<?=$url?>"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</div>
<?php
global $post;
$author_id = $post->post_author;
$authorID = get_the_author_meta('ID',$author_id);
$authPerson = get_field('person', 'user_'.$authorID)[0];
if ($authPerson) {
    $authName = get_the_title($authPerson);
    $authRole = get_field('role',$authPerson);
    $authBio = get_field('bio',$authPerson);
    $authImage = get_the_post_thumbnail_url($authPerson,'thumbnail');
    $authLinkedIn = get_field('linkedin',$authPerson);
    ?>
<section class="author">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-sm-2 text-center mb-4">
                    <img src="<?=$authImage?>" alt="<?=$authName?>" class="rounded-circle">
                </div>
                <div class="col-sm-10">
                    <div class="d-flex justify-content-between">
                        <h3><?=$authName?></h3>
                        <?php
                        if ($authLinkedIn) {
                            echo '<a href="' . $authLinkedIn . '" target="_blank"><i class="fs-5 fa-brands fa-linkedin-in"></i></a>';
                        }
                        ?>
                    </div>
                    <h4 class="fs-5"><?=$authRole?></h4>
                    <div class="fs-7"><?=$authBio?></div>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php
}
?>
</main>
<?php
get_footer();
