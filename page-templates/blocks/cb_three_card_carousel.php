<!-- three_card_carousel -->
<section class="three_card_carousel">
    <div class="overlay--dots-wo"></div>
    <div class="container">
        <div class="slider">
            <?php
            $cards = get_field('cards');
            foreach ($cards as $c) {

                $ID = $c->ID;

                if (get_field('alt_title',$ID)) {
                    $title = get_field('alt_title',$ID);
                }
                else {
                    $title = get_the_title($ID);
                }

                if (get_field('alt_image',$ID)) {
                    $img = wp_get_attachment_image_url(get_field('alt_image',$ID),'large');
                    $stat = 'alt image';
                }
                elseif (get_the_post_thumbnail_url($ID,'large')) {
                    $img = get_the_post_thumbnail_url($ID,'large');
                    $stat = 'featured';
                }
                elseif (catch_that_image($ID)) {
                    $img = catch_that_image($ID);
                    $stat = 'catch';
                }
                else {
                    $img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
                    $stat = 'default';
                }

                if (get_field('excerpt',$ID)) {
                    $words = get_field('excerpt',$ID);
                }
                else {
                    $words = wp_trim_words(apply_filters('the_content', get_post_field('post_content', $c->ID)),30);
                }

                ?>
                <div class="slider__item px-3" data-aos="fade-up">
                    <a href="<?=get_the_permalink($c->ID)?>">
                        <div class="card h-100 p-3">
                            <div class="slider__item__image mb-3" style="background-image:url(<?=$img?>)"></div>
                            <?php
                            if (get_field('excerpt_title',$c->ID)) {
                                ?>
                            <h3 class="fs-5"><?=get_field('excerpt_title',$c->ID)?></h3>
                                <?php
                            }
                            ?>
                            <div class="slider__item__intro"><?=$words?></div>
                            <div class="news__item__overlay"></div>
                            <div class="readmore">Read More</div>
                        </div>
                    </a>
                </div>
                <?php
                $active = '';
            }
            ?>
        </div>
    </div>
</section>
<?php
add_action('wp_footer',function(){
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$('.slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    arrows: false,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    }
    ]
});
</script>
    <?php
});