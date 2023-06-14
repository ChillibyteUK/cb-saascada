<!-- people_grid -->
<section class="people_grid">
    <div class="container">
        <div class="row g-4 mb-4">
            
<?php
$team = get_field('team');

$q = new WP_Query(array(
    'post_type' => 'people',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'teams',
            'field' => 'term_id',
            'terms' => $team
        )
    )
));

while ($q->have_posts()) {
    $q->the_post();
    ?>
    <div class="col-md-6 col-lg-4 person" data-aos="fade-up">
        <div class="card h-100">
            <div class="person__img" style="background-image:url('<?=get_the_post_thumbnail_url(get_the_ID(),'full')?>')"></div>
            <div class="person__meta">
                <div class="person__name">
                    <div class="person__title"><?=get_the_title()?></div>
                    <div class="person__role"><?=get_field('role',get_the_ID())?></div>
                </div>
                <div class="person__linkedin" data-aos="flip-left" data-aos-delay="250">
                    <a href="<?=get_field('linkedin',get_the_ID())?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="person__bio">
                <?=get_field('bio',get_the_ID())?>
            </div>
        </div>
    </div>
    <?php
}

wp_reset_postdata();

?>
        </div>
    </div>
</section>
