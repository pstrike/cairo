<?php
// ==========================================================================================
// Codepages option-tree functions theme
// @package Cairo
// @author Codepages - Codepages
// ==========================================================================================

//Require option-tree functions theme header
function cairo_ot_header_logo_link() {
	return '<span class="title"><img src="'.CAIRO_URL.'admin/assets/images/logo-admin.png" alt="'. esc_html( 'Cairo Theme', 'cairo' ) .'"></span>
					<span class="sub-title">'. esc_html( sprintf( _x( 'v%s', 'v{version}', 'cairo' ), CAIRO_THEME_VERSION ) ) .'</span>
					<span class="link-site"><a href="#">Codepages</a></span>';
}
add_filter( 'ot_header_logo_link', 'cairo_ot_header_logo_link' );


//Require option-tree functions typography fields
function cairo_typography_fields( $array, $field_id ) {
 if ( $field_id == "post_meta_font" || $field_id == "body_font" || $field_id == "text_font" || $field_id == "header_menu_font" ) {
    $array = array( 'font-family');
 }
 return $array;
}
add_filter( 'ot_recognized_typography_fields', 'cairo_typography_fields', 10, 2 );

//Require functions typography google fonts
$cairo_fonts = array();
function cairo_google_fonts() {
		global $cairo_fonts;
		$options = array(
			array(
					'option' => "heading_1",
					'default' => "Poppins"
			),
			array(
					'option' => "heading_2",
					'default' => "Poppins"
			),
			array(
					'option' => "heading_3",
					'default' => "Poppins"
			),
			array(
					'option' => "heading_4",
					'default' => "Poppins"
			),
			array(
					'option' => "heading_5",
					'default' => "Poppins"
			),
			array(
					'option' => "heading_6",
					'default' => "Poppins"
			),
			array(
					'option' => "body_font",
					'default' => "Droid Serif"
			),
			array(
					'option' => "text_font",
					'default' => "Poppins"
			),
			array(
					'option' => "post_meta_font",
					'default' => "Rajdhani"
			),
			array(
					'option' => "header_menu_font",
					'default' => false
			),
		);
		$import = '';

		$protocol = is_ssl() ? 'https' : 'http';

		foreach($options as $option) {
			$array = ot_get_option($option['option']);

			if (!empty($array['font-family'])) {
				if (!in_array($array['font-family'], $cairo_fonts)) {
					array_push($cairo_fonts, $array['font-family']);
				}
			} else if ($option['default']) {
				if (!in_array($option['default'], $cairo_fonts)) {
					array_push($cairo_fonts, $option['default']);
				}
			}
		}
		$font_list = array_unique($cairo_fonts);

		foreach($font_list as $font) {
			$cssfont = str_replace(' ', '+', $font);
			$query_args = array(
				'family' => $cssfont.':200,300,400,500,600,700',
			);
			$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
			$import .= "<link href='".$font_url."' rel='stylesheet' type='text/css'>\n";
		}
		return $import;
}

//Require functions typography google fonts
function cairo_font_typography($array, $important = false, $default = false) {
	global $cairo_fonts;

	if(!empty($array)) {

		if (!empty($array['font-family'])) {
			echo "font-family: '" . $array['font-family'] . "';\n";
		} else if ($default) {
			echo "font-family: '" . $default . "';\n";
		}
		if (!empty($array['font-color'])) {
			echo "color: " . $array['font-color'] . ";\n";
		}
		if (!empty($array['font-style'])) {
			echo "font-style: " . $array['font-style'] . ";\n";
		}
		if (!empty($array['font-variant'])) {
			echo "font-variant: " . $array['font-variant'] . ";\n";
		}
		if (!empty($array['font-weight'])) {
			echo "font-weight: " . $array['font-weight'] . ";\n";
		}
		if (!empty($array['font-size'])) {

			if ($important) {
				echo "font-size: " . $array['font-size'] . " !important;\n";
			} else {
				echo "font-size: " . $array['font-size'] . ";\n";
			}
		}
		if (!empty($array['text-decoration'])) {
				echo "text-decoration: " . $array['text-decoration'] . " !important;\n";
		}
		if (!empty($array['text-transform'])) {
				echo "text-transform: " . $array['text-transform'] . " !important;\n";
		}
		if (!empty($array['line-height'])) {
				echo "line-height: " . $array['line-height'] . " !important;\n";
		}
		if (!empty($array['letter-spacing'])) {
				echo "letter-spacing: " . $array['letter-spacing'] . " !important;\n";
		}
	}
	if(empty($array) && !empty($default)) {
		echo "font-family: '" . $default . "';\n";
	}
}

if( ! function_exists('cairo_id_static') ) {
	function cairo_id_static(){
		static $rand = 0;
		return $rand++;
	}
}
