<!-- partners -->
<section class="partners">
    <div class="container">
    <?php
        $cats = get_categories( array( 'taxonomy' => 'partner-type'));
        ?>
        <div class="filters mb-4">
            <select name="" id="filter-select" class="form-select">
                <option value="all">All</option>
            <?php
        foreach ($cats as $cat) {
            echo '<option value="' . cbslugify($cat->name) . '">' . $cat->cat_name . '</option>';
        }
        ?>
            </select>
        </div>

        <div class="grid w-100 pb-4" id="grid">
            <?php
$q = new WP_Query(array(
    'post_type' => 'partners',
    'posts_per_page' => -1,
    'post_status' => 'publish'
));

    while ($q->have_posts()) {
        $q->the_post();
        $url = get_field('url',get_the_ID()) ?? null;
        $cats = get_the_terms( get_the_ID(), 'partner-type');
        $category = wp_list_pluck($cats, 'name');
        $flashcat = cbslugify($category[0]);
        $catclass = implode(' ', array_map( 'cbslugify', $category ) );
        $category = implode(', ',$category);
        ?>
<a class="grid-item card p-3 <?=$catclass?>" href="<?=$url?>" target="_blank" rel="nofollow">
    <div class="partner__logo">
        <img src="<?=get_the_post_thumbnail_url(get_the_ID(),'large')?> " alt="">
    </div>
    <!-- <h2 class="fs-4"><?=get_the_title()?></h2> -->
    <div><?=get_field('description',get_the_ID())?></div>
</a>
        <?php
    }
wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php
$cta_block = get_field('partner_cta_block','options');
$bg = wp_get_attachment_image_url( get_field('hero_image','options'), 'full' );
?>
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
<?php

add_action('wp_footer',function(){
    ?>
    <script>
document.addEventListener('DOMContentLoaded', () => {
    // Get the select dropdown element
    const filterSelect = document.getElementById('filter-select');
    
    // Get all the grid items
    const gridItems = document.querySelectorAll('.grid-item');
    
    // Function to show/hide grid items based on the class
    function filterItems(filterClass) {
        gridItems.forEach(item => {
            if (filterClass === 'all' || item.classList.contains(filterClass)) {
                item.style.display = 'block';
                setTimeout(() => {
                    item.classList.remove('hidden');
                }, 0);
            } else {
                item.classList.add('hidden');
                setTimeout(() => {
                    item.style.display = 'none';
                }, 0);
            }
        });
    }

    // Add event listener to the select dropdown
    filterSelect.addEventListener('change', () => {
        const filterClass = filterSelect.value; // Use the selected value as the filter class
        filterItems(filterClass);
    });

});
    </script>
    <?php
},9999);