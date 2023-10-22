<?php namespace Renick\Fonts\Models;

use Renick\Fonts\Classes\FontStylesheet;

class FontsSettings extends \System\Models\SettingModel
{
    use \October\Rain\Database\Traits\Multisite;

    public $settingsCode = 'renick_fonts_settings';
    public $settingsFields = 'fields.yaml';
    protected $propagatable = [];

    public function afterSave(): void
    {
        FontStylesheet::make(
            FontStylesheet::getDefaultPath()
        );
    }
}
