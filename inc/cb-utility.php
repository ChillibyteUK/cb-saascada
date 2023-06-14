<?php

function parse_phone($phone)
{
    $phone = preg_replace('/\s+/', '', $phone);
    $phone = preg_replace('/\(0\)/', '', $phone);
    $phone = preg_replace('/[\(\)\.]/', '', $phone);
    $phone = preg_replace('/-/', '', $phone);
    $phone = preg_replace('/^0/', '+44', $phone);
    return $phone;
}

function split_lines($content) {
    $content = preg_replace('/<br \/>/','<br/>&nbsp;<br/>',$content);
    return $content;
}

add_shortcode('contact_address', function(){
    $output = get_field('contact_address','options');
    return $output;
});

add_shortcode('contact_phone', function(){
    if (get_field('contact_phone','options')) {
        return '<a href="tel:' . parse_phone(get_field('contact_phone','options')) . '">' . get_field('contact_phone','options') . '</a>';
    }
    return;
});
add_shortcode('contact_email', function(){
    if (get_field('contact_email','options')) {
        return '<a href="mailto:' . get_field('contact_email','options') . '">' . get_field('contact_email','options') . '</a>';
    }
    return;
});
add_shortcode('contact_email_icon', function(){
    if (get_field('contact_email','options')) {
        return '<a href="mailto:' . get_field('contact_email','options') . '"><i class="fas fa-envelope"></i></a>';
    }
    return;
});
add_shortcode('social_fb_icon', function () {
    $social = get_field('social', 'options');
    $fburl = $social['facebook_url'];
    if ($fburl != '') {
        return '<a href="' . $fburl . '" target="_blank"><i class="fab fa-facebook"></i></a>';
    }
    return;
});
add_shortcode('social_ig_icon', function () {
    $social = get_field('social', 'options');
    $igurl = $social['instagram_url'];
    if ($igurl != '') {
        return '<a href="' . $igurl . '" target="_blank"><i class="fab fa-instagram"></i></a>';
    }
    return;
});
add_shortcode('social_tw_icon', function () {
    $social = get_field('social', 'options');
    $twurl = $social['twitter_url'];
    if ($twurl != '') {
        return '<a href="' . $twurl . '" target="_blank"><i class="fab fa-twitter"></i></a>';
    }
    return;
});
add_shortcode('social_pt_icon', function () {
    $social = get_field('social', 'options');
    $pturl = $social['pinterest_url'];
    if ($pturl != '') {
        return '<a href="' . $pturl . '" target="_blank"><i class="fab fa-pinterest"></i></a>';
    }
    return;
});
add_shortcode('social_yt_icon', function () {
    $social = get_field('social', 'options');
    $yturl = $social['youtube_url'];
    if ($yturl != '') {
        return '<a href="' . $yturl . '" target="_blank"><i class="fab fa-youtube"></i></a>';
    }
    return;
});
add_shortcode('social_in_icon', function () {
    $social = get_field('social', 'options');
    $inurl = $social['linkedin_url'];
    if ($inurl != '') {
        return '<a href="' . $inurl . '" target="_blank"><i class="fab fa-linkedin"></i></a>';
    }
    return;
});
add_shortcode('social_gp_icon', function () {
    $social = get_field('social', 'options');
    $gpurl = $social['google_url'];
    if ($gpurl != '') {
        return '<a href="' . $gpurl . '" target="_blank"><i class="fas fa-globe-americas"></i></a>';
    }
    return;
});


/**
 * Grab the specified data like Thumbnail URL of a publicly embeddable video hosted on Vimeo.
 *
 * @param  str $video_id The ID of a Vimeo video.
 * @param  str $data 	  Video data to be fetched
 * @return str            The specified data
 */
function get_vimeo_data_from_id( $video_id, $data ) {
    // width can be 100, 200, 295, 640, 960 or 1280
	$request = wp_remote_get( 'https://vimeo.com/api/oembed.json?url=https://vimeo.com/' . $video_id . '&width=960');
	
	$response = wp_remote_retrieve_body( $request );
	
	$video_array = json_decode( $response, true );
	
	return $video_array[$data];
}


function gb_gutenberg_admin_styles() {
    echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 1040px;
            }
 
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 1080px;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }	
        </style>
    ';
}
add_action('admin_head', 'gb_gutenberg_admin_styles');



// God I hate Gravity Forms
// Change textarea rows to 4 instead of 10
add_filter( 'gform_field_content', function ( $field_content, $field ) {
    if ( $field->type == 'textarea' ) {
        return str_replace( "rows='10'", "rows='4'", $field_content );
    } 
    return $field_content;
}, 10, 2 );


function get_the_top_ancestor_id() {
	global $post;
	if ( $post->post_parent ) {
		$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
		return $ancestors[0];
	} else {
		return $post->ID;
	}
}

function cb_json_encode($string) {
    // $value = json_encode($string);
    $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
    $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
    $result = str_replace($escapers, $replacements, $string);
    $result = json_encode($result);
    return $result;
}

function cb_time_to_8601($string) {
    $time = explode(':',$string);
    $output = 'PT' . $time[0] . 'H' . $time[1] . 'M' . $time[2] . 'S';
    return $output;
}


function cbdump($var) {
    // ob_start();
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    return; // ob_get_clean();
}

function cbslugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

function cb_social_share($id) {
    ob_start();
    $url = get_the_permalink($id);

    ?>
    <div class="text-larger text--yellow mb-5">
        <div class="h4 text-dark">Share</div>
        <a target='_blank' href='https://twitter.com/share?url=<?=$url?>' class="mr-2"><i class='fab fa-twitter'></i></a>
        <a target='_blank' href='http://www.linkedin.com/shareArticle?url=<?=$url?>' class="mr-2"><i class='fab fa-linkedin-in'></i></a>
        <a target='_blank' href='http://www.facebook.com/sharer.php?u=<?=$url?>'><i class='fab fa-facebook-f'></i></a>
    </div>
    <?php
    
    $out = ob_get_clean();
    return $out;
}


function enable_strict_transport_security_hsts_header() {
    header( 'Strict-Transport-Security: max-age=31536000' );
}
add_action( 'send_headers', 'enable_strict_transport_security_hsts_header' );


function cb_list($field) {
    ob_start();
    $field = strip_tags($field, '<br />');
    $bullets = preg_split("/\r\n|\n|\r/", $field);
    foreach ($bullets as $b) {
        if ($b == '') { continue; }
        ?>
    <li><?=$b?></li>
        <?php
    }
    return ob_get_clean();
}

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'K', 'M', 'G', 'T');   

    return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
}


function acf_toggle_flex()
{

?>
    <script type="text/javascript">
        (function($) {
            acf.add_action('load', function($el) {

                let $field = $el.find('.acf-field-flexible-content'); // Get flexabile fields
                $field = Array.prototype.slice.call($field); // Convert to array

                $field.forEach(function(container) { // Loop through all fields on the page

                    // Create button
                    let btn = document.createElement("a");
                    btn.classList.add('button', 'button-primary', 'toggle-flex-fields');
                    btn.innerText = 'Toggle';

                    // Prepend button on top of the container
                    container.prepend(btn);

                    // Get toggleable fields
                    const item = container.querySelectorAll(".layout");

                    // Add click event to button
                    btn.addEventListener('click', function(event) {
                        event.preventDefault();
                        item.forEach(function(item) {
                            item.classList.toggle('-collapsed')
                        });
                    });

                });
            });

        })(jQuery);
    </script>
<?php

}

add_action('acf/input/admin_footer', 'acf_toggle_flex');

function catch_that_image($postID) {
    // global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $content = get_the_content(null, null, $postID);
    
    // return '<pre>' . $postID . '<br>' . htmlspecialchars( $content ) . '</pre>';

    preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*)/i' ,  $content, $matches);

/*    preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches); */
    $first_img = $matches [1] [0];
    if(empty($first_img)){ //Defines a default image
         $first_img = get_stylesheet_directory_uri() . '/img/default-blog.jpg';
    }
    return $first_img;
}