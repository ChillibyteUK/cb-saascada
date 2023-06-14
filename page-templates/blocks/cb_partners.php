<!-- partners -->
<section class="partners">
    <div class="container">
        <div class="row g-4 pt-4 pb-5 justify-content-center">
            <?php
$q = new WP_Query(array(
    'post_type' => 'partners',
    'posts_per_page' => -1,
    'post_status' => 'publish'
));

    while ($q->have_posts()) {
        $q->the_post();
        $url = get_field('url',get_the_ID());
        ?>
<div class="col-md-6 col-lg-4">
    <?php
    if ($url) {
        ?>
    <a href="<?=$url?>" target="_blank" rel="nofollow">
        <?php
    }
    ?>
        <div class="card h-100 p-3 partner">
            <div class="partner__logo">
                <img src="<?=get_the_post_thumbnail_url(get_the_ID(),'large')?> " alt="">
            </div>
            <!-- <h2 class="fs-4"><?=get_the_title()?></h2> -->
            <div><?=get_field('description',get_the_ID())?></div>
        </div>
    <?php
    if ($url) {
        ?>
    </a>
        <?php
    }
    ?>
</div>
        <?php
    }
wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php
$cta_block = get_field('partner_cta_block','options');
$bg = wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
?>
<section class="cta_block" style="background-image: url(<?=$bg?>)">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-right" data-aos-once="true">
                <h2><?=$cta_block['title']?></h2>
                <div class="mb-4"><?=$cta_block['content']?></div>
                <?php
                $cta = $cta_block['link'];
                ?>
                <div class="text-end">
                    <a class="btn btn-primary" href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                </div>
            </div>
        </div>
    </div>
</section>
