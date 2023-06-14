<!-- icon_cards -->
<section class="icon_cards">
    <div class="container">
        <div class="row g-4">
            <?php
            while(have_rows('cards')) {
                the_row();
                ?>
            <div class="col-md-6" data-aos="fade-up">
                <a href="<?=get_sub_field('link')?>">
                    <div class="card h-100 p-3">
                        <div class="d-flex mb-2">
                            <img src="<?=wp_get_attachment_image_url(get_sub_field('icon'),'full')?>" class="icon">
                            <h2 class="section_title fs-5 flex-fill"><?=get_sub_field('title')?></h2>
                        </div>
                        <?=get_sub_field('content')?>
                    </div>
                </a>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>