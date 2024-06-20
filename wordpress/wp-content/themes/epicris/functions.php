<?php
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_resource_hints', 2 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
	remove_action( 'wp_head', 'print_emoji_detection_script', 7);
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'rel_canonical');
	remove_action( 'wp_print_styles', 'print_emoji_styles');

	// Отключаем сам REST API
	add_filter('rest_enabled', '__return_false');

	// Отключаем фильтры REST API
	remove_action( 'template_redirect',          'rest_output_link_header'); 
	remove_action( 'wp_head',                    'rest_output_link_wp_head');
	remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
	remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
	remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
	remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
	remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
	remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
	remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

	// Отключаем события REST API
	remove_action( 'init',          'rest_api_init' );
	remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
	remove_action( 'parse_request', 'rest_api_loaded' );

	// Отключаем Embeds связанные с REST API
	remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
	remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );

	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	// если собираетесь выводить вставки из других сайтов на своем, то закомментируйте след. строку.
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	show_admin_bar(false);
	remove_filter( 'the_content', 'wpautop' );
	
	// отключаем создание миниатюр файлов для указанных размеров
	add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
	function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'1536x1536',
		'2048x2048',
	] );
	}

	//разрешаем все элементы тега img 
	function wph_add_all_elements($init) {
	if(current_user_can('unfiltered_html')) {
	$init['extended_valid_elements'] = 'span[*]';
	}
	return $init;
	}
	add_filter('tiny_mce_before_init', 'wph_add_all_elements', 20);

	
	// Анонс на главной
	function mayak_segment_length($length) {
		return 18;
	}
	add_filter('excerpt_length', 'mayak_segment_length');

	function mayak_segment_more($more) {
		return '...';
	}
	add_filter('excerpt_more', 'mayak_segment_more');
	
	function wps_deregister_styles() {
	wp_deregister_script('jquery'); 
    wp_dequeue_style( 'wp-block-library' );
	}
	add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );	

	// Отключить редакции
	function my_revisions_to_keep( $revisions ) {
		return 0;
	}
	add_filter( 'wp_revisions_to_keep', 'my_revisions_to_keep' );
	

	// shortcode год
	function currentYear( $atts ){
    return date('Y');
	}
	add_shortcode( 'year', 'currentYear' );


	// shortcode месяц
	function currentMonth( $atts ){
    return date_i18n('F');
	}
	add_shortcode( 'month', 'currentMonth' );
	

	/*шорткод в заголовке статьи */
	function add_shortcode_to_title( $title ){
        return do_shortcode($title);
    }
    add_filter( 'the_title', 'add_shortcode_to_title' );


	function wph_exclude_pages($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
    }
		return $query;
	}
	add_filter('pre_get_posts','wph_exclude_pages');
	
	
	function wph_auto_blank_links_comments($text) {
    $return = str_replace('<a', '<a target="_blank"', $text);
		return $return;
	}
	add_filter('get_comment_author_link', 'wph_auto_blank_links_comments');
	add_filter('comment_text', 'wph_auto_blank_links_comments');
	
	
	function remove_nofollow($string) {
	$string = str_ireplace(' rel="nofollow"', '', $string);
		return $string;
	}
	add_filter('comment_text', 'remove_nofollow'); 


	add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	function my_navigation_template( $template, $class ){
 	return '<div class="paginator">%3$s</div>';}
?>
<?php
class WP_HTML_Compression
{
    // Settings
    protected $compress_css = true;
    protected $compress_js = true;
    protected $info_comment = true;
    protected $remove_comments = true;

    // Variables
    protected $html;
    public function __construct($html)
    {
   	 if (!empty($html))
   	 {
   		 $this->parseHTML($html);
   	 }
    }
    public function __toString()
    {
   	 return $this->html;
    }
    protected function bottomComment($raw, $compressed)
    {
   	 $raw = strlen($raw);
   	 $compressed = strlen($compressed);
   	 $savings = ($raw-$compressed) / $raw * 100;
   	 $savings = round($savings, 2);
   	 return '<!--HTML compressed, size saved '.$savings.'%. From '.$raw.' bytes, now '.$compressed.' bytes-->';
    }
    protected function minifyHTML($html)
    {
   	 $pattern = '/<(?<script>script).*?<\/script\s*>|<(?<style>style).*?<\/style\s*>|<!(?<comment>--).*?-->|<(?<tag>[\/\w.:-]*)(?:".*?"|\'.*?\'|[^\'">]+)*>|(?<text>((<[^!\/\w.:-])?[^<]*)+)|/si';
   	 preg_match_all($pattern, $html, $matches, PREG_SET_ORDER);
   	 $overriding = false;
   	 $raw_tag = false;
   	 // Variable reused for output
   	 $html = '';
   	 foreach ($matches as $token)
   	 {
   		 $tag = (isset($token['tag'])) ? strtolower($token['tag']) : null;
   		 $content = $token[0];
   		 if (is_null($tag))
   		 {
   			 if ( !empty($token['script']) )
   			 {
   				 $strip = $this->compress_js;
   			 }
   			 else if ( !empty($token['style']) )
   			 {
   				 $strip = $this->compress_css;
   			 }
   			 else if ($content == '<!--wp-html-compression no compression-->')
   			 {
   				 $overriding = !$overriding;
   				 
   				 // Don't print the comment
   				 continue;
   			 }
   			 else if ($this->remove_comments)
   			 {
   				 if (!$overriding && $raw_tag != 'textarea')
   				 {
   					 // Remove any HTML comments, except MSIE conditional comments
   					 $content = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $content);
   				 }
   			 }
   		 }
   		 else
   		 {
   			 if ($tag == 'pre' || $tag == 'textarea')
   			 {
   				 $raw_tag = $tag;
   			 }
   			 else if ($tag == '/pre' || $tag == '/textarea')
   			 {
   				 $raw_tag = false;
   			 }
   			 else
   			 {
   				 if ($raw_tag || $overriding)
   				 {
   					 $strip = false;
   				 }
   				 else
   				 {
   					 $strip = true;
   					 
   					 // Remove any empty attributes, except:
   					 // action, alt, content, src
   					 $content = preg_replace('/(\s+)(\w++(?<!\baction|\balt|\bcontent|\bsrc)="")/', '$1', $content);
   					 
   					 // Remove any space before the end of self-closing XHTML tags
   					 // JavaScript excluded
   					 $content = str_replace(' />', '/>', $content);
   				 }
   			 }
   		 }
   		 
   		 if ($strip)
   		 {
   			 $content = $this->removeWhiteSpace($content);
   		 }
   		 $html .= $content;
   	 }
   	 return $html;
    }
    public function parseHTML($html)
    {
   	 $this->html = $this->minifyHTML($html);
   	 
   	 if ($this->info_comment)
   	 {
   		 $this->html .= "\n" . $this->bottomComment($html, $this->html);
   	 }
    }
    protected function removeWhiteSpace($str)
    {
   	 $str = str_replace("\t", ' ', $str);
   	 $str = str_replace("\n",  '', $str);
   	 $str = str_replace("\r",  '', $str);
   	 while (stristr($str, '  '))
   	 {
   		 $str = str_replace('  ', ' ', $str);
   	 }
   	 return $str;
    }
}

function wp_html_compression_finish($html)
{
    return new WP_HTML_Compression($html);
}
function wp_html_compression_start()
{
    ob_start('wp_html_compression_finish');
}
add_action('get_header', 'wp_html_compression_start');
?>