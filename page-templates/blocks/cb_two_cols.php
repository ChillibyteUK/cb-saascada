<!-- two_cols -->
<section class="two_cols">
    <?php
    if (get_field('show_background')) {
        ?>
    <div class="overlay--dots"></div>
        <?php
    }
    ?>
    <div class="container">
        <?php
        if (get_field('title')) {
            ?>
        <h2 class="h1 text-center mb-4" data-aos="fade"><?=get_field('title')?></h2>
            <?php
        }
        ?>
        <div class="row g-5">
            <div class="col-md-6 pe-md-5" data-aos="fade-right">
                <h2 class="section_title">
                    <?=get_field('left_title')?>
                </h2>
                <div>
                    <?=get_field('left_content')?>
                </div>
                <?php
                if (get_field('left_cta')) {
                    $cta = get_field('left_cta');
                    ?>
                <div class="text-end">
                    <a class="btn btn-primary me-4" href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-6 ps-md-5" data-aos="fade-left">
                <h2 class="section_title">
                    <?=get_field('right_title')?>
                </h2>
                <div>
                    <?=get_field('right_content')?>
                </div>
                <?php
                if (get_field('right_cta')) {
                    $cta = get_field('right_cta');
                    ?>
                <div class="text-end">
                    <a class="btn btn-primary me-4" href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>