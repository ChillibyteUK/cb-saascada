<?php
$className = 'button_bar';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
?>
<!-- button_bar -->
<section class="<?=esc_attr($className)?>">
    <div class="container py-4" data-aos="fade">
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <div class="filter__label">Quick Links</div>
            <select class="filter form-select">
            <?php
            while(have_rows('buttons')) {
                the_row();
                ?>
            <option value="<?=get_sub_field('id')?>"><?=get_sub_field('label')?></option>
                <?php
            }
            ?>
            </select>
        </div>
    </div>
</section>
<?php
add_action('wp_footer',function(){
    ?>
<script>
(function($){

$('select.filter').after('<ul class="list"></ul>');
$('select.filter option').each(function () {
    $('ul.list').append('<li><a href="#' + $(this).val() + '" data-value="' + $(this).val() + '" class="btn btn-outline-primary">' + $(this).text() + '</a></li>');
});

//set first item as active on ready
$('ul.list li:eq(0)').addClass('active');

// set active to selction and sync

// update dropdown when links selected
$('ul.list > li > a').click(function(){
   $('ul.list > li').removeClass('active');
   $(this).parent().addClass('active');
	var e =  $(this).parent().index();
   $('select.filter option:eq('+e+')').prop('selected', true);
});
// update list when dropdown selected
$('select.filter').change(function() {
	var e =  $('option:selected', this).index();
    $('ul.list > li').removeClass('active');
    $('ul.list > li:eq('+e+')').addClass('active');
    window.location.hash = this.value;
});

}(jQuery));
</script>
    <?php
});