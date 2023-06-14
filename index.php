<?php
// Exit if accessed directly.
defined('ABSPATH') || exit;


$bg = wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );

get_header();
?>
<main id="main">
<!-- hero -->
    <section id="hero" class="hero d-flex" style="background-image:url(<?=$bg?>)">
        <div class="hero__inner container d-flex align-items-center py-5">
            <div class="my-auto w-100">
                <div class="row">
                    <div class="col-lg-6 hero__content" data-aos="fade">
                        <h1><?=get_field('insights_title','options')?></h1>
                        <div class="hero__content fs-4 mb-4"><?=get_field('insights_subtitle','options')?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay--bottom"></div>
    </section>

    <div class="container py-5">
        <?php
        if (get_field('insights_intro','options')) {
            echo '<div class="mb-5">' . get_field('insights_intro','options') . '</div>';
        }

        $cats = get_categories();
        ?>
        <div class="filters mb-4">
            <?php
        echo '<button class="btn btn-outline-primary active me-2 mb-2" data-filter="*">All</button>';
        foreach ($cats as $cat) {
            echo '<button class="btn btn-outline-primary me-2 mb-2" data-filter=".' . cbslugify($cat->name) . '">' . $cat->cat_name . '</button>';
        }
        ?>
        </div>
        <div class="row w-100" id="grid">
            <?php
            while (have_posts()) {
                the_post();
                if (get_field('alt_image')) {
                    $img = wp_get_attachment_image_url( get_field('alt_image'), 'large' );
                }
                elseif (get_the_post_thumbnail_url( get_the_ID(), 'large' ) ) {
                    $img = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                }
                else {
                    // $img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
                    $img = catch_that_image( get_the_ID() );
                }
                $cats = get_the_category();
                $category = wp_list_pluck($cats, 'name');
                $flashcat = cbslugify($category[0]);
                $catclass = implode(' ', array_map( 'cbslugify', $category ) );
                $category = implode(', ',$category);
                ?>
            <div class="grid_item col-lg-4 col-md-6 p-0 <?=$catclass?>">
                <a href="<?=get_the_permalink()?>" class="news__item m-2">
                    <div class="news__image" style="background-image:url(<?=$img?>)">
                        <div class="news__flash news__flash--<?=$flashcat?>"><?=$category?></div>
                    </div>
                    <div class="news__inner">
                        <div class="news__title"><?php
                        if (get_field('alt_title')) {
                            echo get_field('alt_title');
                        }
                        else {
                            echo get_the_title();
                        }?></div>
                        <div class="news__date"><?=get_the_date('j F, Y')?><?php
                        global $post;
                        $author_id = $post->post_author;
                        $authorID = get_the_author_meta('ID',$author_id);
                        $authPerson = get_field('person', 'user_'.$authorID)[0];
                        if ($authPerson) {
                            echo ' / ' . get_the_title($authPerson);
                        }
                        ?>
                        </div>
                        <div class="news__intro"><?=wp_trim_words(get_the_content(),30)?></div>
                    </div>
                    <div class="news__item__overlay"></div>
                </a>
            </div>
                <?php
            }
            ?>
        </div>
        <div class="mt-5">
        <?php
        numeric_posts_nav();
        ?>
        </div>
    </div>
    <?php
    $cta_block = get_field('cta_block','options');
    $bg = wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
    ?>
    <!-- cta_block -->
    <section class="cta_block" style="background-image: url(<?=$bg?>)">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right" data-aos-once="true">
                    <h2><?=$cta_block['title']?></h2>
                    <div class="mb-4"><?=$cta_block['content']?></div>
                    <?php
                    $cta = $cta_block['link'];
                    ?>
                    <div class="text-end">
                        <a class="btn btn-primary" href="<?=$cta['url']?>" target="<?=$cta['target']?>"><?=$cta['title']?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
add_action('wp_footer',function(){
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
(function($){
        
    var $grid=$('#grid').isotope({
        itemSelector:'.grid_item',
        percentPosition: true,
        layoutMode: 'fitRows',
    });
    
    $('.filters').on('click','button',function(){
        var filterValue=$(this).attr('data-filter');
        $('.filters').find('.active').removeClass('active');
        $(this).addClass('active');
        $grid.isotope({filter:filterValue});
    });



})(jQuery);
</script>
    <?php
},9999);

get_footer();