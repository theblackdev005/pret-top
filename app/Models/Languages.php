<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public static function get()
    {
        $languages["en"] = "English";
        $languages["fr"] = "Français";
        $languages["de"] = "Deutsch";
        $languages["bg"] = "български";
        $languages["da"] = "dansk";
        $languages["es"] = "Español";
        $languages["it"] = "italiano";
        $languages["lb"] = "Lëtzebuergesch";
        $languages["lt"] = "lietuvių"; 
        $languages["lv"] = "latviski";
        $languages["ro"] = "Română";
        $languages["sv"] = "svenska";
        $languages["et"] = "eesti keel";
        $languages["pt"] = "português";
        $languages["no"] = "norsk";
        $languages["fi"] = "Suomalainen";
        $languages["ru"] = "русский";
        $languages["nl"] = "Nederlands";
        $languages["sl"] = "Slovenščina";
        $languages["mn"] = "Монгол";
        $languages["hu"] = "Magyar";
        $languages["el"] = "Ελληνικά";
        $languages["pl"] = "Polskie";
        $languages["uz"] = "o'zbek";
        
        $languages["hr"] = "Hrvatski";
        $languages["ky"] = "Кыргызча";
        $languages["hy"] = "հայերեն";
        $languages["kk"] = "қазақ";
        $languages["tg"] = "точикон";
        $languages["tr"] = "Türk";
        $languages["sk"] = "Slovenský";
        $languages["sq"] = "Shqiptare";

        return $languages;
    }

    /**
     * Check if the language is valid.
     *
     * @param string $iso_code
     * @return boolean|string Returns language name if valid, false otherwise
     */
    public static function check($iso_code)
    {
        $languages = self::get();

        if ( ! empty($languages[ $iso_code ]) ) {
            return $languages[ $iso_code ];
        }
        return false;
    }

    /**
     * Validate if the provided language locale exists.
     *
     * @param string $locale
     * @return boolean
     */
    public static function isValid($locale)
    {
        $languages = self::get();
        return array_key_exists($locale, $languages);
    }
}
