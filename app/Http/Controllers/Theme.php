<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;


class Theme extends Controller
{
	# https://www.rapidtables.com/convert/color/hex-to-rgb.html

	private $scan_data = [];
	private $themeConfigFile = null;

	private $DEFAULT_THEME_COLORS = [
		'theme__4' => [
			'is_default' => true,
			'#0044a7' => '#006CFF',
			'#26b1ff' => '#006CFF',
			'#e6eff8' => '#EEF5FF',
			'#008bd3' => '#006CFF',
			'#1297cc' => '#006CFF',
			'#108bea' => '#006CFF',
			'#1769ff' => '#006CFF',
			'#205081' => '#006CFF',
			'#005be2' => '#006CFF',
			'#3b5998' => '#006CFF',
			'#0063dc' => '#006CFF',
			'#2d5be3' => '#006CFF',
			'#487aa2' => '#006CFF',
			'#0077b5' => '#006CFF',
			'#00aff0' => '#006CFF',
			'#00adee' => '#006CFF',
			'#2ca5e0' => '#006CFF',
			'#1aa1d8' => '#006CFF',
			'#6441a5' => '#006CFF',
			'#1da1f2' => '#006CFF',
			'#665cac' => '#006CFF',
			'#6b1f9e' => '#006CFF',
			'#1ab7ea' => '#006CFF',
			'#0099e5' => '#006CFF',
			'#ccd6df' => '#006CFF',
			'#ceddec' => '#006CFF',
			'#ececec' => '#006CFF',
			'#d7e4f1' => '#006CFF',
			'rgba(107,31,158,0.62)' => 'rgba(0, 108, 255,0.62)',
			'rgba(107,31,158,0.18)' => 'rgba(0, 108, 255,0.18)',
			'#581982' => '#111111',
			'rgb(0 68 167 / 50%)' => 'rgba(14,84,50,0.5)'
		],
	];

	private static $onlyThisFiles = [
		// 'css/custom.css',
		// 'css/style.css',
	];

	public function __construct() {
		$DIR = base_path('resources'. DIRECTORY_SEPARATOR .'theme-generator' . DIRECTORY_SEPARATOR);
		$this->themeConfigFile = $DIR . 'theme-generator.json';

		self::scanpath($this->scan_data, $DIR);
	}

	private static function scanpath(&$result, $dir)
	{
		if ( !is_dir($dir) ) {
			return abort(404);
		}

	    $scan = scandir($dir);
	    foreach ($scan as $file) {
	        $file = trim($file, '.');
	        if ( !empty($file) ) {
	            
	            $fullDirName = $dir . $file;
	            if ( is_dir($fullDirName) ) {
	                self::scanpath($result, $fullDirName . DIRECTORY_SEPARATOR);
	            } else {
	                if ( pathinfo($fullDirName, PATHINFO_EXTENSION) <> 'css' ) {
	                    continue;
	                }

	                # Get only files
	                if ( !empty(self::$onlyThisFiles) ) {
	                    
	                    foreach (self::$onlyThisFiles as $name) {
	                        if ( stripos(str_ireplace(DIRECTORY_SEPARATOR, '/', $fullDirName), $name) !== false ) {
	                            $result[] = $fullDirName;
	                        }
	                    }
	                } else {
	                    $result[] = $fullDirName;
	                }
	                
	            }

	        }
	    }
	}

	private function getTargetColor($toColor)
	{
		$usedTheme = false;
		foreach ($this->DEFAULT_THEME_COLORS as $theme) {
			if ( !empty($theme['is_default']) ) {
				$usedTheme = $theme;
				break;
			}
		}
		if ( !$usedTheme ) {
			return abort(404, 'Aucun theme défini !');
		}

		return !empty($usedTheme[$toColor])
			? $usedTheme[$toColor]
			: $toColor;
	}

	public function index()
	{
		$resColors = [];
		$themeConfigFileData = json_decode(file_get_contents($this->themeConfigFile), true);

		foreach ($this->scan_data as $file) {

			$contentOf = file_get_contents($file);
			$fileNewDestination = str_ireplace('resources'. DIRECTORY_SEPARATOR .'theme-generator' . DIRECTORY_SEPARATOR, 'public' . DIRECTORY_SEPARATOR, $file);

			if ( !is_dir($dirx = dirname($fileNewDestination)) ) {
				mkdir($dirx, 0777, true);
			}

			foreach ($themeConfigFileData as $fromColor => $toColor) {
				$toColor = $this->getTargetColor($toColor);
				$contentOf = str_ireplace($fromColor, $toColor, $contentOf);
			}
			file_put_contents($fileNewDestination, $contentOf);

			echo "$file<br>";
		}

		Artisan::call("config:cache");
		Artisan::call("route:cache");
		Artisan::call("view:cache");
		Artisan::call("key:generate", ['--force' => true]);

		dd( Artisan::output() );
		die;
	}

	public function generate_config()
	{
		$resColors = [];
		foreach ($this->scan_data as $file) {

			# Traitement
			$ct = file_get_contents($file);
			preg_match_all("/#([a-f0-9]{3}){1,2}\b/i", $ct, $matchesHEX);
			preg_match_all("/rgba\([0-9\,\.]+\)/i", $ct, $matchesRGB);

			foreach ($matchesHEX[0] as $value) {
				$resColors[] = $value;
			}
			foreach ($matchesRGB[0] as $value) {
				$resColors[] = $value;
			}
		}
		$data = [];
		$resColors = array_unique($resColors);
		foreach ($resColors as $color) {
			$data[ $color ] = $color;
		}
		file_put_contents($this->themeConfigFile, json_encode($data, JSON_PRETTY_PRINT));
		die;
	}
}
