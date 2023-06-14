<!-- quote_text_block -->
<section class="quote_text">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4 quote_text__quote" data-aos="fade-right">
                <div class="card">
                    <div class="quote_text__quote_text"><?=get_field('quote')?></div>
                </div>
            </div>
            <div class="col-lg-8 quote_text__content" data-aos="fade-left">
                <?php
                if (get_field('title')) {
                    echo '<h2 class="section_title">' . get_field('title') . '</h2>';
                }
                ?>
                <div class="content"><?=get_field('content')?></div>
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