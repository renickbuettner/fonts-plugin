<?php namespace Renick\Fonts\Classes;

use Exception;
use Flash;
use Renick\Fonts\Models\FontsSettings;
use Storage;
use System\Controllers\Settings;

class FontImport
{
    public function onFontImport(Settings $controller): void
    {
        $url = input('url');

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            Flash::error('Invalid URL');
            return;
        }

        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36 Edg/117.0.2045.47"
            ]
        ];
        $res = @file_get_contents($url, false, stream_context_create($opts));
        if (!$res) {
            Flash::error('Could not load URL');
            return;
        }

        $matches = [];
        $counter = 0;
        preg_match_all('/@font-face \{(.*?)\}/si', $res, $matches);

        $fonts = FontsSettings::get('fonts', []);
        foreach ($matches[0] as $m) {
            $font = [];

            preg_match('/font-family: \'(.*?)\';/si', $m, $font['font_name']);
            preg_match('/src: url\(\'(.*?)\'\)|src: url\((.*?)\)/si', $m, $font['font_file']);
            preg_match('/format\(\'(.*?)\'\)/si', $m, $font['font_type']);

            $font['font_name'] = $font['font_name'][1];
            $font['font_type'] = $font['font_type'][1];
            $font['font_face'] = $m;

            $font['font_file'] = $font['font_file'][2] ?? $font['font_file'][1];
            if (!filter_var($font['font_file'], FILTER_VALIDATE_URL))
                continue;

            try {
                $oldUrl = $font['font_file'];
                $font['font_file'] = $this->storeFontFile($font['font_file'], $font['font_type']);
                $font['font_face'] = str_replace($oldUrl, url("storage/app/media/{$font['font_file']}"), $font['font_face']);
            } catch (Exception $e) {
                \Log::error($e);
                Flash::error('Could not store font file');
                return;
            }

            $counter++;
            $fonts[] = $font;
        }

        FontsSettings::set('fonts', $fonts);
        Flash::success("Imported {$counter} fonts");
    }

    /**
     * Downloads file from url, and stores it locally
     * @param string $url
     * @return string
     * @throws Exception
     */
    public function storeFontFile(string $url, string $type): string
    {
        $content = @file_get_contents($url);
        if (!$content)
            throw new Exception('Could not download file');
        $hash = sha1($content);
        $disk = Storage::disk('local');
        $ext = $this->getFontFileExtension($type);
        $localPath = "media/fonts/{$hash}.{$ext}";
        $disk->put($localPath, $content);
        return "fonts/{$hash}.{$ext}";
    }

    public function getFontFileExtension(string $type): string
    {
        return match (strtolower($type)) {
            'woff' => 'woff',
            'woff2' => 'woff2',
            'truetype' => 'ttf',
            'opentype' => 'otf',
            'embedded-opentype' => 'eot',
            default => throw new Exception('Unknown font type'),
        };
    }
}
