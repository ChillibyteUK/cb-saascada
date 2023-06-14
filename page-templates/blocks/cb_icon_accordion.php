<section class="icon_accordion">
    <div class="container">
        <div id="accordion" class="accordion">
            <?php
            $n = 0;
            $show = 'show';
            while(have_rows('accordion')) {
                the_row();
                if (get_sub_field('id')) {
                    echo '<a class="anchor" id="' . get_sub_field('id') . '"></a>';
                }
                ?>
                <div class="accordion-item">
                    <div class="accordion-header" id="heading_<?=$n?>">
                        <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?=$n?>">
                            <img src="<?=wp_get_attachment_image_url(get_sub_field('icon'))?>" class="icon_accordion__icon">
                            <?=get_sub_field('title')?>
                        </div>
                    </div>
                    <div id="collapse_<?=$n?>" class="accordion-collapse collapse <?=$show?>" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <?=get_sub_field('content')?>
                        </div>
                    </div>
                </div>
                <?php
                $n++;
                $show = '';
            }
            ?>
        </div>
    </div>
</section>