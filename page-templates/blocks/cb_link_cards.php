<!-- link_cards -->
<section class="link_cards pb-5">
    <div class="container-xl">
        <div class="row">
            <?php
            while(have_rows('links')) {
                the_row();
                $link = get_sub_field('link');
                ?>
            <div class="col-md-4 link_card">
                <a href="<?=$link['url']?>" target="<?=$link['target']?>">
                    <div class="link_card__card">
                        <?=$link['title']?>
                    </div>
                </a>
            </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>