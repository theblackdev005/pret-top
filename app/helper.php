<?php

use Illuminate\Support\Facades\Route;

if ( ! function_exists('addr2_array') ) {
	function addr2_array($url){
		$i = 0; $data = array();
		$file = file( $url, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
		foreach($file as $value){
			$explode = explode('|', $value);
			$_explode = array_map("trim", $explode);
			$__explode = array_map("str_replacing", $_explode);
			$data[$i] = $__explode;
			$i++;
		}
		return $data;
	}
}

if ( !function_exists('social_meta_tags') ) {
	function social_meta_tags() {
		# OG:BALISES
		$data[] = array( "name" 		=> "google", 				"content" => "notranslate" );
		$data[] = array( "property" 	=> "description", 			"content" => translate(106) );
		$data[] = array( "property" 	=> "og:site_name", 			"content" => SITE_NAME );
		$data[] = array( "property" 	=> "og:type", 				"content" => "website" );
		$data[] = array( "property" 	=> "og:title", 				"content" => site_title() );
		$data[] = array( "property" 	=> "og:description", 		"content" => translate(106) );
		$data[] = array( "property" 	=> "og:image", 				"content" => site_favicon() );
		$data[] = array( "property" 	=> "og:url", 				"content" => url()->current() );
		$data[] = array( "name" 		=> "twitter:card", 			"content" => site_favicon() );
		$data[] = array( "name" 		=> "twitter:site", 			"content" => SITE_NAME );
		$data[] = array( "name" 		=> "twitter:title", 		"content" => site_title() );
		$data[] = array( "name" 		=> "twitter:description", 	"content" => translate(106) );
		
		$meta = '';
		foreach ($data as $array) {
			$meta .= '<meta';
			foreach ($array as $key => $value) {
				$meta .= " ".$key."="."\"$value\"";
			}
			$meta .= '/>'."\n"."\t\t";
		}
		return trim($meta, "\t\t");
	}
}


if ( !function_exists('formFieldNameMaker') ) {
	function formFieldNameMaker(&$properties, $param) {
		$attributeExploded = explode(".", $param);

		$properties = $attributeExploded[0];
		foreach ($attributeExploded as $index => $attribute) {
		    if ( $index === 0 ) {
		        continue;
		    }

		    $properties .= "[$attribute]";
		}
	}
}


if ( ! function_exists('str_replacing') ) {
	function str_replacing($string){
		$return = str_ireplace("(WEBSITE_NAME)", SITE_NAME, $string);
		$return = str_ireplace("(CREATED_ANNO)", WEBSITE_CREATED_DATE, $return);
		$return = str_ireplace("(WEBSITE_URL)",'<a href="'. URL::to('/') .'">'.SITE_WWW.'</a>', $return);
		$return = str_ireplace("(WEBSITE_EMAIL)",'<a href="mailto:'.SITE_EMAIL.'">'.SITE_EMAIL.'</a>', $return);
		$return = str_ireplace("(WEBSITE_ADDRESS)",SITE_ADDRESS, $return);
		$return = str_ireplace("(WEBMASTER_EMAIL)",'<a href="mailto:'.SITE_EMAIL.'">'.SITE_EMAIL.'</a>', $return);
		$return = str_ireplace("(WEBSITE_PHONE)", SITE_PHONE, $return);
		$return = str_ireplace("(WEBMASTER_NAME)",WEBMASTER_NAME, $return);
		$return = str_ireplace("(AUTHOR_NAME)",AUTHOR_NAME, $return);
		$return = str_ireplace("(LEGAL_FULL_NAME)", LEGAL_FULL_NAME, $return);
		$return = str_ireplace("(LEGAL_REGISTRATION_OR_VAT_NUMBER)", LEGAL_REGISTRATION_OR_VAT_NUMBER, $return);
		$return = str_ireplace("(AUTHOR_EMAIL)",'<a href="mailto:'.SITE_EMAIL.'">'.SITE_EMAIL.'</a>', $return);
		$return = str_ireplace("(TEAG)",TEAG, $return);
		$return = str_ireplace("(LOAN_PROCESSING_FEE)", LOAN_PROCESSING_FEE, $return);
		$return = str_ireplace("\\",'<br/>', $return);
		return $return;
	}
}

if ( ! function_exists('legal_notice_information') ) {
	function legal_notice_information() {
		$information = [
			translate(589) => LEGAL_FULL_NAME,
			translate(590) => LEGAL_REGISTRATION_OR_VAT_NUMBER,
		];

		return array_filter($information, function ($value) {
			return trim((string) $value) !== '';
		});
	}
}


if ( ! function_exists('text_wrap') ) {
	function text_wrap($text, $len){
		$text = WordWrap($text, $len, '***', true);
		$array = explode('***', $text);
		return trim(trim($array[0]), ".")." ... ";
	}
}

if ( ! function_exists('testimonials') ) {
	function testimonials(){
		$testimonials = [341, 342, 343, 344, 345, 346];
		$authors = addr2_array(TESTIMONIALS_DIR.'author.name');
		foreach( $authors as $k=>$author){
			$result[] = array(
				'name' 		=> $author[0],
				'country' 	=> $author[1],
				'comment' 	=> $testimonials[$k],
				'avatar' => asset('assets/images/testimonial/' . $k . '.jpg')
			);
		}

		return $result;
	}
}

if ( ! function_exists('translate') ) {
	function translate($key, $wrap=false) {
		$translated_str = str_replacing( __('TRAD_' . $key) );

		if ($wrap) {
			$translated_str = text_wrap($translated_str, $wrap);
		}
		return ucfirst($translated_str);
	}
}

if ( ! function_exists('get_page_contents') ) {
	function get_page_contents($page_action) {
		$dir = PAGE_SAMPLE_DIR . $page_action . '/';
		$file = $dir. app()->getLocale().'.txt';
		if ( !is_dir($dir) || !$file ) {
			return false;
		}

		$textHTML = file_get_contents($file);
		$textHTML = str_replacing($textHTML);
		return $textHTML;
	}
}

if ( ! function_exists('partners') ) {
	function partners(){
		$data = array();
		$files = scandir( PARTNERS_ASSETS_DIR );
		foreach($files as $file){
			$file = trim($file, ".");
			$ext = strtolower( substr($file, strrpos($file, ".")+1) );
			if(in_array($ext, ["jpg", "gif", "png", "jpeg"])){
				$name = substr($file, 0, strrpos($file, "."));
				if(!empty($file)){
					$data[$name] = basename($file);
				}
			}
		}
		return $data;
	}
}

if ( ! function_exists('routeWithLocale') ) {
	function routeWithLocale($name, $parameter=null) {
		$route_param[] = app()->getLocale();
		if ( !empty($parameter) ) {
			$route_param[] = $parameter;
		}

		return route($name, $route_param);
	}
}

if ( ! function_exists('current_page_name') ) {
	function current_page_name(){

		$pages[] = array( "site.contact_us", "73" );
		$pages[] = array( "site.cookie_policy", "77" );
		$pages[] = array( "site.helps", "80" );
		$pages[] = array( "site.loan_offers", "113" );
		$pages[] = array( "site.index", "69" );
		$pages[] = array( "site.assurances", "311" );
		$pages[] = array( "site.about_us", "296" );
		$pages[] = array( "site.legal_notice", "76" );
		$pages[] = array( "site.obtain_financing", "103" );
		$pages[] = array( "site.testimonials", "84" );
		$pages[] = array( "site.how_it_works", "78" );
		
		foreach ($pages as $page) {
			if ( in_array( Route::currentRouteName(), $page) ) {
				return translate($page[1]);
			}
		}
		return null;
	}
}

if ( ! function_exists('site_title') ) {
	function site_title(){
		if ( current_page_name() ) {
			return current_page_name() . ' | ' .SITE_NAME;
		}
		return SITE_NAME;
	}
}

if ( ! function_exists('site_copyright') ) {
	function site_copyright() {
		return '&copy;' . WEBSITE_CREATED_DATE .  ' - ' . SITE_NAME . '. ' . translate(1);
	}
}

if ( ! function_exists('site_favicon') ) {
	function site_favicon() {
		return asset('assets/images/icons/favicon.png');
	}
}

if ( ! function_exists('site_logo') ) {
	function site_logo() {
		return asset_img('logo.svg');
	}
}

if ( ! function_exists('asset_img') ) {
	function asset_img($uri) {
		return asset('assets/images/' . $uri);
	}
}

if ( ! function_exists('asset_css') ) {
	function asset_css($uri) {
		return asset('assets/css/' . $uri);
	}
}

if ( ! function_exists('asset_js') ) {
	function asset_js($uri) {
		return asset('assets/js/' . $uri);
	}
}

if ( ! function_exists('loanOffersLists') ) {
	function loanOffersLists($current=null){
        $services['consumer-loan'] = [ 212, [213, 214] ];
        $services['work-credit'] = [ 308, [309, 310] ];
        $services['real-estate-loan'] = [ 215, [216, 217] ];
        $services['credit-redemption'] = [ 218, [219, 220] ];
        $services['credit-leasing'] = [ 221, [222, 223] ];
        $services['student-loan'] = [ 224, [225, 226] ];

        if ( !empty($services[ $current ]) ) {
        	return $services[ $current ];
        }
        return $services;
    }
}

if ( ! function_exists('FaqsListing') ) {
	function FaqsListing($position=1, $per_page=5){
        $helps[] = [274, 275];
        $helps[] = [276, 277];
        $helps[] = [278, 279];
        $helps[] = [280, 281];
        $helps[] = [282, 283];
        $helps[] = [284, 285];
        $helps[] = [286, 287];
        $helps[] = [288, 289];
        $helps[] = [56, 57];
        $helps[] = [58, 59];

        return array_slice($helps, $position - 1, $per_page);

        return $helps;
    }
}

if ( ! function_exists('assuranceOffersLists') ) {
	function assuranceOffersLists($current=null){
        $services['loan'] = [ 312, [313, 314, 315] ];
        $services['home'] = [ 316, [317, 318, 319, 320] ];
        $services['animal'] = [ 321, [322, 323] ];
        $services['professional'] = [ 324, [325, 326] ];
        $services['health'] = [ 327, [328] ];

        if ( !empty($services[ $current ]) ) {
        	return $services[ $current ];
        }
        return $services;
    }
}
