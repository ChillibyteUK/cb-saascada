<?php
$bg = wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
$title = get_field('title') ? get_field('title') : get_the_title();
$depth = get_field('hero_height') == 'Default' ? '' : 'hero--short';
$pad = get_field('bottom_padding')[0] == 'Yes' ? 'mb-5' : '';
?>    
<!-- hero -->
<section id="hero" class="hero <?=$depth?> d-flex align-items-center <?=$pad?>" style="background-image:url(<?=$bg?>)">
    <div class="hero__inner container d-flex align-items-center py-5">
        <div class="my-auto w-100">
            <div class="row">
                <div class="col-lg-6 hero__content" data-aos="fade">
                    <h1><?=$title?></h1>
                    <?php
                    if (get_field('content')) {
                        ?>
                    <div class="hero__content fs-4 mb-4"><?=get_field('content')?></div>
                        <?php
                    }
                    if (get_field('cta')) {
                        $cta = get_field('cta');
                        ?>
                    <a class="btn btn-primary" href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay--bottom"></div>
</section>
