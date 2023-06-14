<?php
$cta_block = get_field('cta_block','options');
$bg = wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
?>
<!-- cta_block -->
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