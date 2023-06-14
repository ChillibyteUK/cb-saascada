<?php
$order_image = (get_field('order') == 'text_left') ? 'order-1 order-lg-2' : 'order-1 order-lg-1';
$order_text = (get_field('order') == 'text_left') ? 'order-2 order-lg-1' : 'order-2 order-lg-2';
$anim_image = (get_field('order') == 'text_left') ? 'left' : 'right';
$anim_text = (get_field('order') == 'text_left') ? 'right' : 'left';

if( !empty($block['anchor']) ) {
    echo '<a class="anchor" id="' . $block['anchor'] . '"></a>';
}

$background = get_field('background') ? 'icon-bg' : '';
?>
<!-- text_icon_block -->
<section class="text_icon_block">
    <div class="container">
        <?php
        if (get_field('title')) {
            echo '<h2 class="d-lg-none section_title">' . get_field('title') . '</h2>';
        }
        ?>
        <div class="row g-5">
            <div class="col-lg-4 <?=$order_image?> text_icon__icon d-flex justify-content-center align-items-center">
                <?php
                if (get_field('background')) {
                    ?>
                <div class="icon-bg" data-aos="fade"></div>
                    <?php
                }
                ?>
                <img class="text_icon_block__image" src="<?=wp_get_attachment_image_url(get_field('icon'),'full')?>" data-aos="fade-<?=$anim_image?>">
            </div>
            <div class="col-lg-8 text_icon__content <?=$order_text?>" data-aos="fade-<?=$anim_text?>">
                <?php
                if (get_field('title')) {
                    echo '<h2 class="d-none d-lg-block section_title">' . get_field('title') . '</h2>';
                }
                ?>
                <div class="content">
                    <?=get_field('content')?>
                </div>
                    <?php
                if (get_field('apis')) {
                    echo '<div class="fw-bold mt-4 mb-2">Platform APIs</div>';

                    echo '<div class="apis">';
                    foreach (get_field('apis') as $a) {
                        // $icon = wp_get_attachment_image_url(get_field('icon',$a));
                        $icon = get_stylesheet_directory_uri() . '/img/icons/icon__' . $a->slug . '.svg';
                        // $icon_hover = wp_get_attachment_image_url(get_field('icon_hover',$a));
                        $icon_hover = get_stylesheet_directory_uri() . '/img/icons/icon__' . $a->slug . '--bg.svg';
                        // cbdump($a);
                        ?>
                        <a href="/platform/#<?=$a->slug?>" class="apis__link">
                            <div class="apis__icon">
                                <img src="<?=$icon?>" class="apis__img">
                                <img src="<?=$icon_hover?>" class="apis__img--hover">
                            </div>
                            <div class="apis__title--hover"><?=$a->name?></div>
                        </a>
                        <?php
                    }
                    echo '</div>';
                }
                ?>
                <?php
                if (get_field('link')) {
                    $cta = get_field('link');
                    ?>
                    <div class="text-end">
                        <a href="<?=$cta['url']?>" target="<?=$cta['target']?>" class="btn btn-primary"><?=$cta['title']?></a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>