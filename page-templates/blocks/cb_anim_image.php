<?php
$className = 'anim_image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['anchor']) ) {
    echo '<a class="anchor" id="' . $block['anchor'] . '"></a>';
}
?>
<!-- anim_image -->
<section class="<?=esc_attr($className)?>">
    <div class="container">
        <div class="mx-auto text-center" data-aos="fade-up">
            <img src="<?=wp_get_attachment_image_url(get_field('image'),'full')?>">
        </div>
    </div>
</section>