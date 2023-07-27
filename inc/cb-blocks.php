<?php
function acf_blocks() {
	if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(array(
			'name'				=> 'cb_hero',
			'title'				=> __('CB Hero'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_hero.php',
			'keywords'			=> array( 'hero' ),
			'mode'	=> 'edit',
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_two_cols',
			'title'				=> __('CB Two Columns'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_two_cols.php',
			'keywords'			=> array( 'two', 'col' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_three_card_carousel',
			'title'				=> __('CB Three Card Carousel'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_three_card_carousel.php',
			'keywords'			=> array( 'three', 'card', 'carousel' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_cta_block',
			'title'				=> __('CB CTA Block'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_cta_block.php',
			'keywords'			=> array( 'cta', 'block' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_icon_cards',
			'title'				=> __('CB Icon Cards'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_icon_cards.php',
			'keywords'			=> array( 'icon', 'cards' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_text_icon_block',
			'title'				=> __('CB Text Icon Block'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_text_icon_block.php',
			'keywords'			=> array( 'text', 'icon', 'block' ),
			'mode'	=> 'edit',
            // 'supports' => array('mode' => false, 'anchor' => true),
            'supports' => array( 'anchor' => true),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_quote_text_block',
			'title'				=> __('CB Quote Text Block'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_quote_text_block.php',
			'keywords'			=> array( 'text', 'quote', 'block' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_partners',
			'title'				=> __('CB Partners Grid'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_partners.php',
			'keywords'			=> array( 'partners', 'grid' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_partners_slider',
			'title'				=> __('CB Partners Slider'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_partners_slider.php',
			'keywords'			=> array( 'partners', 'slider' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_people',
			'title'				=> __('CB Team Grid'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_people.php',
			'keywords'			=> array( 'team', 'people', 'grid' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_anim_heading',
			'title'				=> __('CB Animated Heading'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_anim_heading.php',
			'keywords'			=> array( 'anim', 'heading' ),
			'mode'	=> 'edit',
            // 'supports' => array('mode' => false, 'anchor' => true),
            'supports' => array('anchor' => true),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_anim_image',
			'title'				=> __('CB Animated Image'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_anim_image.php',
			'keywords'			=> array( 'anim', 'image' ),
			'mode'	=> 'edit',
            // 'supports' => array('mode' => false, 'anchor' => true),
            'supports' => array('anchor' => true),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_address_map',
			'title'				=> __('CB Address Map'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_address_map.php',
			'keywords'			=> array( 'address', 'map' ),
			'mode'	=> 'edit',
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_faq_block',
			'title'				=> __('CB FAQ Block'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_faq_block.php',
			'keywords'			=> array( 'faq', 'block' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_button_bar',
			'title'				=> __('CB Button Bar'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_button_bar.php',
			'keywords'			=> array( 'button', 'bar' ),
			'mode'	=> 'edit',
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_icon_accordion',
			'title'				=> __('CB Icon Accordion'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_icon_accordion.php',
			'keywords'			=> array( 'icon', 'accordion' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_link_cards',
			'title'				=> __('CB Link Cards'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_link_cards.php',
			'keywords'			=> array( 'link', 'cards' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
		acf_register_block_type(array(
			'name'				=> 'cb_video',
			'title'				=> __('CB Video'),
			'category'			=> 'layout',
			'icon'				=> 'cover-image',
			'render_template'	=> 'page-templates/blocks/cb_video.php',
			'keywords'			=> array( 'video', 'vimeo', 'youtube' ),
			'mode'	=> 'edit',
			'supports' => array('anchor' => true),
            // 'supports' => array('mode' => false),
		));
    }
}
add_action('acf/init', 'acf_blocks');

// add_action( 'init', 'register_acf_blocks', 5 );
// function register_acf_blocks() {
//     register_block_type( __DIR__ . '/../page-templates/blocks/test' );
// }

// Gutenburg core modifications
add_filter( 'register_block_type_args', 'core_image_block_type_args', 10, 3 );
function core_image_block_type_args( $args, $name ) {
    if ( $name == 'core/paragraph' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( $name == 'core/list' ) {
        $args['render_callback'] = 'modify_core_add_container';
    }
    if ( $name == 'core/columns' ) {
        // $args['render_callback'] = 'modify_core_add_container';
    }
    if ( $name == 'core/heading' ) {
        $args['render_callback'] = 'modify_core_heading';
    }
    if ( $name == 'core/button' ) {
        $args['render_callback'] = 'modify_core_buttons';
    }
    return $args;
}

function modify_core_add_container($attributes, $content) {
    ob_start();
	global $block;
	$class = $block['className'];
    ?>
    <div class="container <?=$class?>">
		<?=$content?>
    </div>
    <?php
    $content = ob_get_clean();
	return $content;
}

function modify_core_heading($attributes, $content) {
    ob_start();
    $id = strtolower( wp_strip_all_tags( $content ) );
    $id = cbslugify($id);
    ?>
    <div class="container pt-4" id="<?=$id?>">
        <?=$content?>
    </div>
    <?php
    $content = ob_get_clean();
	return $content;
}

function modify_core_buttons($attributes, $content) {
	ob_start();

	$btn = $content;

	preg_match('/class="wp-block-button (.*?)"/', $btn, $class);
	
	preg_match('/href="(.*?)"/', $btn, $link);

	preg_match('/target="(.*?)" rel="(.*?)"/', $btn, $target);

	preg_match('/<a.*?>(.*?)<\/a>/', $btn, $label);

	?>
	<a class="btn <?=$class[1]?>" href="<?=$link[1]?>" target="<?=$target[1]?>" rel="<?=$target[2]?>"><?=$label[1]?></a>
	<?php
	$content = ob_get_clean();
	return $content;
}