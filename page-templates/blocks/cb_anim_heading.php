<?php
$hlevel = get_field('hlevel');
$hstyle = get_field('hstyle');

$className = 'anim_heading';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
else {
    $className .= ' py-4';
}
if( !empty($block['anchor']) ) {
    echo '<a class="anchor" id="' . $block['anchor'] . '"></a>';
}
?>
<!-- anim_heading -->
<section class="<?=esc_attr($className)?>">
    <div class="container">
        <<?=$hlevel?> class="<?=$hstyle?> text-center" data-aos="fade-right"><?=get_field('title')?></<?=$hlevel?>>
        <?php
        if (get_field('content')) {
            ?>
        <div class="w-lg-75 mx-auto text-center" data-aos="fade-right">
            <?=get_field('content')?>
        </div>
            <?php
        }
        ?>
    </div>
</section>