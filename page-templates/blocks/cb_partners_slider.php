<section class="partners_slider">
    <div class="overlay--dots-wo"></div>
    <div class="container">
        <div class="text-white text-center h2 mb-4">Our Partners</div>
        <div class="partnersSlider">
        <?php
        $q = new WP_Query(array(
            'post_type' => 'partners',
            'posts_per_page' => -1,
            'post_status' => 'publish'
        ));

        while ($q->have_posts()) {
            $q->the_post();
            ?>
            <div class="partners_slider__slide">
                <img src="<?=get_the_post_thumbnail_url(get_the_ID(),'large')?>" alt="">
            </div>
            <?php
        }
        ?>
        </div>
        <div class="text-center pt-4">
            <a href="/partners/" class="btn btn-primary">Find out more</a>
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
$('.partnersSlider').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    arrows: false,
    responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 576,
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
