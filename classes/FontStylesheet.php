<?php namespace Renick\Fonts\Classes;

use Renick\Fonts\Models\FontsSettings;
use Storage;

class FontStylesheet
{
    public static function make(string $diskPath): void
    {
        $disk = Storage::disk('local');
        $disk->put($diskPath, self::getCSS());
    }

    public static function getCSS(): string
    {
        $fonts = FontsSettings::get('fonts', []);
        $css = '';
        foreach ($fonts as $font)
            $css .= $font['font_face'] . "\n";
        return $css;
    }

    public static function getDefaultPath(): string
    {
        return env('FONTS_CSS_PATH', 'media/fonts/fonts.css');
    }
}
